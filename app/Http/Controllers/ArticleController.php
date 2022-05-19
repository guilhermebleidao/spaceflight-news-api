<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Articles"},
     *   path="/api/articles",
     *   summary="Article index",
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        return Article::all();
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
     *       @OA\Property(property="featured", type="boolean", example=true)
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
        if (Article::create($data)) {
            return response()->json($data, 201);
        }
    }

    /**
     * @OA\Get(
     *   tags={"Articles"},
     *   path="/api/articles/{id}",
     *   summary="Article show",
     *   @OA\Parameter(name="id", in="path", required=true),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function show($id)
    {
        $article = Article::find($id);
        if (!isset($article->id)) {
            return response()->json(['error' => 'Article not found'], 404);
        }
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * @OA\Delete(
     *   tags={"Articles"},
     *   path="/api/articles/{id}",
     *   summary="Article destroy",
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
        $article->delete();
    }
}
