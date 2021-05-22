<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50','unique:admins,username,'.Auth::user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,'.Auth::user()->id],
            'mobile' => ['required', 'string', 'max:20', 'unique:admins,mobile,'.Auth::user()->id],
            'image'=>'image'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'this :attribute is required',
            'string'=>'this :attribute must be string',
            'name.max'=>':attribute must be less than 50 chars',
            'unique'=>'this :attribute belongs to another doctor',
            'username.max'=>':attribute must be less than 50 chars',
            'email'=>':attribute must be like example@domain.com',
            'mobile.max'=>':attribute must be less than 20 chars',
            'image'=>'the file must be an image format only'

        ];
    }
}
