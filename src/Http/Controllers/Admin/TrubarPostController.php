<?php

namespace Wewowweb\Trubar\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Wewowweb\Trubar\Http\Requests\StoreTrubarPostRequest;
use Wewowweb\Trubar\Http\Requests\UpdateTrubarPostRequest;
use Wewowweb\Trubar\Models\TrubarPost;
use Wewowweb\Trubar\Http\Resources\TrubarPostResource;
use Wewowweb\Trubar\Http\Requests\GetTrubarPostsRequest;

class TrubarPostController extends Controller
{
    use AuthorizesRequests;

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
     * Update the specified resource.
     *
     * @param UpdateTrubarPostRequest $request
     * @param $id
     * @return TrubarPostResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateTrubarPostRequest $request, $id)
    {
        $post = TrubarPost::withTrashed()->findOrFail($id);
        $this->authorize('update', $post);

        $post->fill($request->all());
        $post->save();

        return new TrubarPostResource($post->refresh());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return TrubarPostResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $post = TrubarPost::withTrashed()->findOrFail($id);
        return new TrubarPostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return TrubarPostResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete($id)
    {
        $post = TrubarPost::findOrFail($id);
        $this->authorize('update', $post);
        $post->delete();

        return new TrubarPostResource($post->refresh());
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $id
     * @return TrubarPostResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function restore($id)
    {
        $post = TrubarPost::withTrashed()->findOrFail($id);
        $this->authorize('update', $post);
        $post->restore();

        return new TrubarPostResource($post->refresh());
    }
}
