<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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

            'name'          => 'required',
            'email'         => 'required|email:rfc,dns',
            'entry_time'    => 'required',
            'out_time'      => 'required',
            'password'      => 'required|confirmed|min:8',
            'days'          => 'required',
            
        ];
    }

    public function messages()
    {
        return [

                'name.required' => "El nombre es requerido",
                'email.required' => "El email es requerido",
                'email.email' => "El email no es válido",
                'entry_time.required' => "La hora de entrada es requerida",
                'out_time.required' => "La hora de salida es requerida",
                'password.required' => "La contraseña es requerida",
                'password.confirmed' => "Las contraseñas no coinciden",
                'password.min' => "La contraseña debe contener 8 caracteres como minímo",
                'days.required' => "Los dias de acceso son requeridos",
                

        ];
    }
}
