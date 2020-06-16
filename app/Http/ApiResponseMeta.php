<?php

namespace App\Http;

use Illuminate\Support\Facades\App;

class ApiResponseMeta
{
    // Return error messages, if the app is NOT in production also output the exception
    public function withError($message, $developerMessage = null, $statusCode = 400)
    {
        $errorData = [
            'message' => $message,
        ];

        if ($developerMessage) {
        // if (App::isLocal() && $developerMessage) {
            $errorData = array_merge($errorData, [
                'developer_message' => $developerMessage,
            ]);
        }

        return response()->json($errorData, $statusCode);
    }

    public function withSuccess($message, $statusCode = 200)
    {
        return response()->json(['message' => $message], $statusCode);
    }

    public function withSuccessData($data, $statusCode = 200)
    {
        return response()->json($data, $statusCode);
    }
}
