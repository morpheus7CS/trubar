<?php

namespace Wewowweb\Trubar\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Trubar\Models\TrubarPost  $trubarPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrubarPost $trubarPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Trubar\Models\TrubarPost  $trubarPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrubarPost $trubarPost)
    {
        //
    }
}
