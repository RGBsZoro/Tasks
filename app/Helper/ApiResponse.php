<?php

function successResponse($message = 'success', $data = []){
    return response()->json([
        'message' => $message,
        'data' => $data
    ]);
}

function errorResponse($message, $data = [], $code = 400){
    return response()->json([
        'message' => $message,
        'data' => $data
    ], $code);
}

