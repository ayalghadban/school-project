<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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
