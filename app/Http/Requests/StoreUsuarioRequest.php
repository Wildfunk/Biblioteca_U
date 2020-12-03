<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'rut'=>'required|unique:usuarios,rut',
            'password' =>'required | min:4',
            'cpassword' => 'required | same:password',
            'nombre'=>'required',
            'apellido'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'rut.required'               => 'El campo rut es obligatorio',
            'rut.unique' => 'Ese rut ya se encuentra registrado',
            
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min'    =>  'la contraseña debe tener almenos 4 caracteres',

            'cpassword.required' => 'Confirme contraseña',
            'cpassword.same'     => 'Las constraseñas no coinciden',

            'nombre.required'               => 'El campo nombre es obligatorio',
            'apellido.required'               => 'El campo apellido es obligatorio'
        ];
    }
}
