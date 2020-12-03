<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutorRequest extends FormRequest
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
            'nombre' => 'required |min:2',
            'apellido' => 'required|min:2',
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
            'pais' => 'required|min:2',
            'imagen'            => 'required|file:imagen'
        ];

    }
    public function messages()
    {
        return [
            'nombre.required'               => 'El campo Nombre es obligatorio',
            'nombre.min'                    =>'El nombre debe tener almenos 2 letras',

            'apellido.required'               => 'El campo apellido es obligatorio',
            'apellido.min'                    =>'El apellido debe tener almenos 2 letras',

            'fecha_nacimiento.required'      => 'El campo fecha de nachimiento es obligatorio',
            'fecha_nacimiento.date_format'  =>'Formato de fecha incorrecto',

            'pais.required'                  =>'El campo pais es obligatorio',
            'pais.min'                       =>'El pais debe tener almenos 2 letras',

            'imagen.required'               =>'Se requiere una imagen',
            'imagen.file'                   => 'Se requiere una imagen cargada'



        ];
    }
}
