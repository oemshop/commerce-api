<?php

namespace App\Http\Requests\Base;

use App\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
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
     * Get the validation messages that apply in the error response.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Por favor informe seu email',
            'email.email' => 'O email informado é inválido',
            'password.required' => 'Por favor informe sua senha',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
