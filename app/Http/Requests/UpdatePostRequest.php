<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cover_image'       => ['sometimes', 'mimes:png,jpg,svg,gif', 'max:2048'],
            'title'             => ['required', 'max:200', 'min:5'],
            'category_id'       => ['required'],
            'body'              => ['required', 'min:5'],
            'published_at'      => ['required'],
            'tags'              => ['required'],
            'meta_description'  => ['required', 'max:250', 'min:5'],
        ];
    }
}
