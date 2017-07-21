<?php

namespace App\Traits\Responses;

use Response;

trait ResponseSuccess
{
    /**
     * Return a response json with success layout.
     *
     * @param  Array   $data
     * @param  integer $httpCode
     *
     * @return json
     */
    protected function responseSuccess(Array $data, $httpCode = 200)
    {
        return Response::json([
            'success' => true,
            'ocurred_at' => date('Y-m-d H:i:s'),
            'data' => $data,
        ], $httpCode);
    }
}
