<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successResponse($data = []) {
        return response()->json(['data' => $data], 200);
    }

    public function errorResponse($message = '', $errors = [], $code = 400) {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $code);
    }

    public function unauthorizeResponse($message = '', $errors = []) {
        return $this->errorResponse($message, $errors, 401);
    }
}