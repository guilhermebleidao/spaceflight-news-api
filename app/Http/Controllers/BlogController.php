<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Event;
use App\Models\Launch;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Blogs"},
     *   path="/api/blogs",
     *   summary="Blogs index",
     *   @OA\Parameter(name="page",in="query",required=true,example="1"),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        return Blog::with(['launches', 'events'])->paginate(10);
    }

    /**
     * @OA\Post(
     *   tags={"Blogs"},
     *   path="/api/blogs/",
     *   summary="Blogs store",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"title", "url", "imageUrl", "newsSite", "summary", "publishedAt", "updatedAt"},
     *       @OA\Property(property="title", type="string", example="A blog post :)"),
     *       @OA\Property(property="url", type="string", example="https://www.spaceflightnews.com/newpost"),
     *       @OA\Property(property="imageUrl", type="string", example="https://www.spaceflightnews.com/newpost.png"),
     *       @OA\Property(property="newsSite", type="string", example="Space Flight News"),
     *       @OA\Property(property="summary", type="string", example="New post :o"),
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
    public function store(StoreBlogRequest $request)
    {
        $id = Blog::min('id') -1;
        $id = $id >= 0 ? -1 : $id;

        $data = array_merge(['id' => $id], $request->all());
        $blog = Blog::create($data);

        if (isset($request->launches)) { $blog->updateOrCreateLaunches($request->launches, false); }
        if (isset($request->events)) { $blog->updateOrCreateEvents($request->events, false); }

        return response()->json($data, 201);
    }

    /**
     * @OA\Get(
     *   tags={"Blogs"},
     *   path="/api/blogs/{id}",
     *   summary="Blogs show",
     *   @OA\Parameter(name="id", in="path", required=true),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function show($id)
    {
        $blog = Blog::with(['launches', 'events'])->find($id);
        if (!isset($blog->id)) {
            return response()->json(['error' => 'Blog post not found'], 404);
        }
        return $blog;
    }

    /**
     * @OA\Put(
     *   tags={"Blogs"},
     *   path="/api/blogs/{id}",
     *   summary="Blogs update",
     *   @OA\Parameter(name="id", in="path", required=true),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"title", "url", "imageUrl", "newsSite", "summary", "publishedAt", "updatedAt"},
     *       @OA\Property(property="title", type="string", example="Edited blog post :)"),
     *       @OA\Property(property="url", type="string", example="https://www.spaceflightnews.com/editedpost"),
     *       @OA\Property(property="imageUrl", type="string", example="https://www.spaceflightnews.com/editedpost.png"),
     *       @OA\Property(property="newsSite", type="string", example="Space Flight News"),
     *       @OA\Property(property="summary", type="string", example="Edited post :o"),
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
    public function update(UpdateBlogRequest $request, $id)
    {
        $blog = Blog::find($id);
        $blog->update($request->all());

        if (isset($request->launches)) { $blog->updateOrCreateLaunches($request->launches, true); }
        if (isset($request->events)) { $blog->updateOrCreateEvents($request->events, true); }

        return $blog;
    }

    /**
     * @OA\Delete(
     *   tags={"Blogs"},
     *   path="/api/blogs/{id}",
     *   summary="Blogs destroy",
     *   @OA\Parameter(name="id", in="path", required=true),
     *   @OA\Response(response=200, description="OK"),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if (!isset($blog->id)) {
            return response()->json(['error' => 'Blog post not found'], 404);
        }
        $blog->updateOrCreateLaunches([], true);
        $blog->updateOrCreateEvents([], true);
        $blog->delete();
    }
}
