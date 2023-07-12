<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ResponseErrorController extends Controller
{
    public function sendResponse($message, $data = []) :JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response,200);
    }

    public function sendError($message, $code = 400 ,$data = []) :JsonResponse
    {
        $response = [
            'success' => false,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response,$code);
    }
}
