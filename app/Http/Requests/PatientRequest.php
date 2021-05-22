<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PatientRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:50','unique:patients,username,'.Auth::user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients,email,'.Auth::user()->id],
            'mobile' => ['required', 'string', 'max:20', 'unique:patients,mobile,'.Auth::user()->id],
            'dob' => ['required','date'],
            'blood' => ['required','in:A-,A+,B-,B+,AB-,AB+,O-,O+'],
            'gender' => ['required','in:0,1'],
            'image'=>'image'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'this :attribute is required',
            'string'=>'this :attribute must be string',
            'name.max'=>':attribute must be less than 50 chars',
            'unique'=>'this :attribute belongs to another patient',
            'username.max'=>':attribute must be less than 50 chars',
            'email'=>':attribute must be like example@domain.com',
            'mobile.max'=>':attribute must be less than 20 chars',
            'exists'=>'please select correct :attribute',
            'date'=>'please select correct date',
            'in'=>'please choose from list only',
            'image'=>'the file must be an image format only'

        ];
    }
}
