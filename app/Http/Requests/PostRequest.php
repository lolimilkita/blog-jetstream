<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cover_image'       => ['required', 'mimes:png,jpg,svg,gif', 'max:2048'],
            'title'             => ['required', 'max:200', 'min:5'],
            'category_id'       => ['required'],
            'body'              => ['required', 'min:5'],
            'published_at'      => ['required'],
            'tags'              => ['required'],
            'meta_description'  => ['required', 'max:250', 'min:5'],
        ];
    }
}
