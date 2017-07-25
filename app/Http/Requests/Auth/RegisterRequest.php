<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;

class RegisterRequest extends ApiRequest
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
            'person_type_id' => 'required|exists:person_types,id',
            'name' => 'required|max:255',
            'cpf_cnpj' => 'required',
            'rg_ie' => 'required|max:20',
            'address.title' => 'required|max:255',
            'address.zipcode' => 'required|max:20',
            'address.street' => 'required|max:255',
            'address.number' => 'required|max:20',
            'address.complement' => 'required|max:255',
            'address.reference' => 'required|max:255',
            'address.neighborhood' => 'required|max:255',
            'address.city' => 'required|max:255',
            'address.state' => 'required|max:2',
            'contacts' => 'required|array|min:1',
            'contacts.*.title' => 'required|max:255',
            'contacts.*.phone' => 'required|max:20',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|min:8|max:20',
        ];
    }
}
