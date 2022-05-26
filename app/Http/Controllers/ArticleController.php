<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Event;
use App\Models\Launch;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Articles"},
     *   path="/api/articles",
     *   summary="Articles index",
     *   @OA\Parameter(name="page",in="query",required=true,example="1"),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        return Article::with(['launches', 'events'])->paginate(10);
    }

    /**
     * @OA\Post(
     *   tags={"Articles"},
     *   path="/api/articles/",
     *   summary="Articles store",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"title", "url", "imageUrl", "newsSite", "summary", "publishedAt", "updatedAt"},
     *       @OA\Property(property="title", type="string", example="An article :)"),
     *       @OA\Property(property="url", type="string", example="https://www.spaceflightnews.com/newarticle"),
     *       @OA\Property(property="imageUrl", type="string", example="https://www.spaceflightnews.com/newarticle.png"),
     *       @OA\Property(property="newsSite", type="string", example="Space Flight News"),
     *       @OA\Property(property="summary", type="string", example="New article :o"),
     *       @OA\Property(property="publishedAt", type="string", example="2022-05-16T22:43:44.148Z"),
     *       @OA\Property(property="updatedAt", type="string", example="2022-05-16T22:43:44.148Z"),
     *       @OA\Property(property="featured", type="boolean", example=true),
     *       @OA\Property(property="launches", type="array",
     *         @OA\Items(type="object", format="query",
     *           @OA\Property(property="id", type="string", example="l4unc8-1d"),
     *           @OA\Property(property="provider", type="string", example="Launch Provider")
     *         )
     *       ),
     *       @OA\Property(property="events", type="array",
     *         @OA\Items(type="object", format="query",
     *           @OA\Property(property="id", type="string", example="3v3nt-1d"),
     *           @OA\Property(property="provider", type="string", example="Event Provider")
     *         )
     *       )
     *     )
     *   ),
     *   @OA\Response(response=201, description="Created"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function store(StoreArticleRequest $request)
    {
        $id = Article::min('id') -1;
        $id = $id >= 0 ? -1 : $id;

        $data = array_merge(['id' => $id], $request->all());
        $article = Article::create($data);

        $article->updateOrCreateLaunches(isset($request->launches) ? $request->launches : [], false);
        $article->updateOrCreateEvents(isset($request->events) ? $request->events : [], false);

        return response()->json($data, 201);
    }

    /**
     * @OA\Get(
     *   tags={"Articles"},
     *   path="/api/articles/{id}",
     *   summary="Articles show",
     *   @OA\Parameter(name="id", in="path", required=true),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function show($id)
    {
        $article = Article::with(['launches', 'events'])->find($id);
        if (!isset($article->id)) {
            return response()->json(['error' => 'Article not found'], 404);
        }
        return $article;
    }

    /**
     * @OA\Put(
     *   tags={"Articles"},
     *   path="/api/articles/{id}",
     *   summary="Articles update",
     *   @OA\Parameter(name="id", in="path", required=true),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"title", "url", "imageUrl", "newsSite", "summary", "publishedAt", "updatedAt"},
     *       @OA\Property(property="title", type="string", example="Edited article :)"),
     *       @OA\Property(property="url", type="string", example="https://www.spaceflightnews.com/editedarticle"),
     *       @OA\Property(property="imageUrl", type="string", example="https://www.spaceflightnews.com/editedarticle.png"),
     *       @OA\Property(property="newsSite", type="string", example="Space Flight News"),
     *       @OA\Property(property="summary", type="string", example="Edited article :o"),
     *       @OA\Property(property="publishedAt", type="string", example="2022-05-16T22:43:44.148Z"),
     *       @OA\Property(property="updatedAt", type="string", example="2022-05-16T22:43:44.148Z"),
     *       @OA\Property(property="launches", type="array",
     *         @OA\Items(type="object", format="query",
     *           @OA\Property(property="id", type="string", example="l4unc8-1d"),
     *           @OA\Property(property="provider", type="string", example="Launch Provider")
     *         )
     *       ),
     *       @OA\Property(property="events", type="array",
     *         @OA\Items(type="object", format="query",
     *           @OA\Property(property="id", type="string", example="3v3nt-1d"),
     *           @OA\Property(property="provider", type="string", example="Event Provider")
     *         )
     *       )
     *     )
     *   ),
     *   @OA\Response(response=201, description="Created"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */

    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->update($request->all());

        $article->updateOrCreateLaunches(isset($request->launches) ? $request->launches : [], true);
        $article->updateOrCreateEvents(isset($request->events) ? $request->events : [], true);

        return $article;
    }

    /**
     * @OA\Delete(
     *   tags={"Articles"},
     *   path="/api/articles/{id}",
     *   summary="Articles destroy",
     *   @OA\Parameter(name="id", in="path", required=true),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if (!isset($article->id)) {
            return response()->json(['error' => 'Article not found'], 404);
        }
        $article->updateOrCreateLaunches([], true);
        $article->updateOrCreateEvents([], true);
        $article->delete();
    }
}
