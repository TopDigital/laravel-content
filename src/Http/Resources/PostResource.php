<?php

namespace TopDigital\Content\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at->format('U'),
            'updated_at' => $this->updated_at->format('U'),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('U') : null,
        ];
    }
}
