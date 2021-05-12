<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PutCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'      => 'required',
            'slug'      => 'required',
            'title'     => 'required',
        ];

        switch($this->method()) {
            // case 'PUT':
            // case 'PATCH':
            //     $rules['slug'] = 'required|unique:posts,slug,' . $this->route('blog');
            //     break;
        }

        return $rules;
    }
}
