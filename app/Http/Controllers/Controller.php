<?php

namespace App\Http\Controllers;

use App\Models\Memberjurie;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function finalResponse(
        $message = "success",
        $statusCode = 200,
        $data = null,
        $errors = null
    ): JsonResponse {
        return response()->json([
            "message" => $message,
            "data" => $data,
            'errors' => $errors
        ], $statusCode);
    }

    public  function RandomNb(){
        do {
            $nb = str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
            $exists = Memberjurie::where('code', $nb)->exists();
        } while ($exists);
        
        return $nb;
    }

    // public function ErrorResponse(
    //     $message = "error",
    //     $statusCode = 200,
    //     $data = null,
    //     $errors = null
    // ): JsonResponse {
    //     return response()->json([
    //         "message" => $message,
    //         "data" => $data,
    //         'errors' => $errors
    //     ], $statusCode);
    // }
    // public function Response($message, $data, $errors, $statusCode): JsonResponse
    // {
    //     return response()->json([
    //         "message" => $message,
    //         "data" => $data,
    //         'errors' => $errors
    //     ], $statusCode);
    // }
}
