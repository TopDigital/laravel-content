<?php

namespace TopDigital\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContentRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'section_id' => ['required', 'numeric'],
            'slug' => ['required', 'string'],
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'published_at' => ['string', 'date_format:d.m.Y'],
        ];
    }
}
