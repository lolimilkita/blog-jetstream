<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'unique:tags'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.unique' => 'Tag sudah ada'
    //     ];
    // }

    public function name(): string
    {
        return $this->get('name');
    }
}
