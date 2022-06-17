<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required|min:5'
        ];
    }


    // public function messages()
    // {
    //     return[
    //         'title.required' => 'gaung sin htae par',
    //         'body.required' => 'a kyaung yar htae par',
    //         'body.min' => 'anal sone 5 lone shi ya mal'
    //     ];
    // }

    public function attributes()
    {
        return [
            'body' => 'content'
        ];
    }
}
