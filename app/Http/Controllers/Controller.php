<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function success($data, $messege = null, $code = 200)
    {
        return response()->json([
            'status' => 'Request was succesful!',
            'messege' => $messege,
            'data' => $data,
        ], $code);
    }

    public function error($data, $messege, $code)
    {
        return response()->json([
            'status' => 'Error has occurred!',
            'messege' => $messege,
            'data' => $data,
        ], $code);
    }
}
