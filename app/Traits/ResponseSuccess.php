<?php

namespace App\Traits\Responses;

use Response;

trait ResponseSuccess
{
    /**
     * Return a response json with success layout.
     *
     * @param  array $data
     * @param  int   $httpCode
     *
     * @return json
     */
    protected function responseSuccess(array $data, $httpCode = 200)
    {
        return Response::json([
            'success' => true,
            'ocurred_at' => date('Y-m-d H:i:s'),
            'data' => $data,
        ], $httpCode);
    }
}
