<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
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
            'rut'=> 'required | exists:usuarios,rut',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'rut.required'               => 'Ingrese su rut',
            'rut.exists'         =>'Ese rut no existe en el sistema',

            'password.required' => 'Ingrese su contraseña'
            
        ];
    }
}
