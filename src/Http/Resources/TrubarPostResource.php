<?php

namespace Wewowweb\Trubar\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrubarPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->ids,
            'permalink' => $this->permalink,
            'author_id' => $this->author_id,
            'post_type_id' => $this->post_type_id,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
