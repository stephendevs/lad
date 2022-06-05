<?php

namespace Stephendevs\Lad\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'username' => 'required|min:3|max:30|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:6,max:12|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'The email address provided has been taken',
            'username.required' => 'Please enter username',
        ];
    }
}
