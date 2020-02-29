<?php

namespace TopDigital\Content\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at->format('U'),
            'updated_at' => $this->updated_at->format('U'),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('U') : null,
        ];
    }
}
