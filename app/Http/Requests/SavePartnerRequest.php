<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePartnerRequest extends FormRequest
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

            'name'                  => 'required',
            'last_name'             => 'required',
            'document'              => 'required |digits:11|numeric',
            'address'               => 'required',
            'email'                 => 'required|email|unique:partners',
            'phone'                 => 'required',
            'investment_mount'      => 'required|numeric',
            'rate'                  => 'required|numeric',
            'percent_investment'    => 'required|numeric',
            'percent_participation' => 'required|numeric',
            
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
            'address.required' => "La dirección es requerida",
            'email.required' => "El email es requerido",
            'email.unique' => "El email ya fue registrado",
            'email.email' => "El email debe ser uno válido",
            'phone.required' => "El teléfono es requerido",
            'investment_mount.required' => "El monto de inversión es requerido",
            'investment_mount.numeric' => "El monto de inversión debe ser un número",
            'rate.required' => "La tasa de interés es requerida",
            'rate.numeric' => "La tasa de interés debe ser un número",
            'percent_investment.required' => "El % de inversión es requerido",
            'percent_investment.numeric' => "El % de inversión debe ser un número",
            'percent_participation.required' => "El % de participación es requerido",
            'percent_participation.numeric' => "El % de participación debe ser un número",

        ];
    }
}
