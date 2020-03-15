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
            'preview_url' => $this->preview_url ? config('app.url') . $this->preview_url : null,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
