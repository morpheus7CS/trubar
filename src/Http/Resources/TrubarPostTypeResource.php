<?php

namespace Wewowweb\Trubar\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrubarPostTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
