<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' =>'string|min:2|max:50',
            'email' =>'string|email|unique:users,email',
            'password' =>'string|min:6|max:50', // password
        ];
    }
}
