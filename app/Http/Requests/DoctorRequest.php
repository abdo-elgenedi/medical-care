<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DoctorRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:50','unique:doctors,username,'.Auth::user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors,email,'.Auth::user()->id],
            'mobile' => ['required', 'string', 'max:20', 'unique:doctors,mobile,'.Auth::user()->id],
            'dob' => ['required','date'],
            'gender' => ['required','in:0,1'],
            'city' => ['required','exists:cities,id'],
            'speciality_id' => ['required','exists:specialties,id'],
            'bio' => ['required','string'],
            'price' => ['required','numeric'],
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
            'exists'=>'please select correct :attribute',
            'date'=>'please select correct date',
            'in'=>'please choose from list only',
            'image'=>'the file must be an image format only'

        ];
    }

    public function attributes()
    {
        return [
          'speciality_id'=>'Speciality'
        ];
    }
}
