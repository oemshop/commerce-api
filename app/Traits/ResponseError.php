<?php

namespace App\Traits\Responses;

use Response;

trait ResponseError
{
    /**
     * Return a response json with error layout.
     *
     * @param  array   $data
     * @param  int     $httpCode
     * @param  string  $message
     *
     * @return json
     */
    protected function responseError(array $messages, $httpCode = 500, $type = 'API_ERROR')
    {
        return Response::json([
            'error' => true,
            'type' => $type,
            'messages' => $messages,
            'http_code' => $httpCode,
            'ocurred_at' => date('Y-m-d H:i:s'),
        ], $httpCode);
    }
}
