<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\Responses\ResponseError;

class ApiRequest extends FormRequest
{
    use ResponseError;

    /**
     * Return the validation erros like response errors.
     *
     * @param  array  $errors
     *
     * @return json
     */
    public function response(array $errors)
    {
        return $this->responseError($errors, 422, 'validation_errors');
    }
}
