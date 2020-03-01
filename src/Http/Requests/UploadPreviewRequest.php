<?php

namespace TopDigital\Content\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPreviewRequest extends FormRequest
{
    public function rules()
    {
        return [
            'preview' => 'mimetypes:image/jpeg,image/png',
        ];
    }
}
