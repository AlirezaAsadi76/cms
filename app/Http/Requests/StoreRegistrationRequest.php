<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $stopOnFirstFailure=true;
    protected $redirectRoute='Register.create';
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
            'name' =>'required|min=5',
            'email'=>'required|email',
            'password'=>'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'name can not empty',

            'password.required'=>'email can not empty',

            'email.required'=>'password can not empty',

        ];
    }
}
