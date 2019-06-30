<?php

namespace Wewowweb\Trubar\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Wewowweb\Trubar\Http\Requests\StoreTrubarPostRequest;
use Wewowweb\Trubar\Models\TrubarPost;
use Wewowweb\Trubar\Http\Resources\TrubarPostResource;
use Wewowweb\Trubar\Http\Requests\GetTrubarPostsRequest;

class TrubarPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param GetTrubarPostsRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(GetTrubarPostsRequest $request)
    {
        $perPage = $request->get('per_page') ?? 10;
        $posts = $request->get('trashed_only') ? TrubarPost::onlyTrashed()->paginate($perPage) : TrubarPost::paginate($perPage);

        return TrubarPostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTrubarPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTrubarPostRequest $request)
    {
        $post = TrubarPost::create([
            'author_id' => $request->user()->getAuthIdentifier(),
            'post_type' => $request->get('post_type'),
            'post_status' => $request->get('post_status'),
            'parent_id' => $request->get('parent_id'),
            'title' => $request->get('title'),
            'excerpt' => $request->get('excerpt'),
            'body' => $request->get('body'),
            'published_at' => $request->get('published_at'),
        ]);

        return (new TrubarPostResource($post->refresh()))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return TrubarPostResource
     */
    public function show($id)
    {
        return new TrubarPostResource(TrubarPost::withTrashed()->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Trubar\Models\TrubarPost $trubarPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrubarPost $trubarPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Trubar\Models\TrubarPost $trubarPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrubarPost $trubarPost)
    {
        //
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param \Trubar\Models\TrubarPost $trubarPost
     * @return \Illuminate\Http\Response
     */
    public function restore(TrubarPost $trubarPost)
    {
        //
    }
}
