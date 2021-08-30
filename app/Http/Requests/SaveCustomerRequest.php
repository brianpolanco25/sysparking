<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCustomerRequest extends FormRequest
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

            'name'              => 'required',
            'last_name'         => 'required',
            'document'          => 'required|digits:11|numeric|unique:customers,document',
            'address'           => 'required',
            'email'             => 'required|email|unique:customers',
            'phone'             => 'required',
            'investment_mount'  => 'required|numeric',
            'rate'              => 'required|numeric',
            
        ];
    }

    public function messages()
    {
        return [

                'name.required' => "El nombre es requerido",
                'last_name.required' => "El nombre es requerido",
                'document.required' => "La cédula es requerida",
                'document.digits' => "La cédula debe contener 11 dígitos",
                'document.numeric' => "La cédula debe contener solo números",
                'document.unique' => "La cédula ya fue registrada en otro cliente",
                'address.required' => "La dirección es requerida",
                'email.required' => "El email es requerido",
                'email.email' => "El email debe ser uno válido",
                'email.unique' => "El email ya fue registrado",
                'phone.required' => "El teléfono es requerido",
                'investment_mount.required' => "El monto de inversión es requerido",
                'investment_mount.numeric' => "El monto de inversión debe ser un número",
                'rate.required' => "La tasa de interés es requerida",
                'rate.numeric' => "La tasa de interés debe ser un número",

        ];
    }
}
