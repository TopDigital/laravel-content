<?php

namespace TopDigital\Content\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'section_id' => $this->section_id,
            'slug' => $this->slug,
            'title' => $this->title,
            'content' => $this->content,
            'published_at' => $this->published_at ? $this->published_at->format('U') : null,
            'created_at' => $this->created_at->format('U'),
            'updated_at' => $this->updated_at->format('U'),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('U') : null,
        ];
    }
}
