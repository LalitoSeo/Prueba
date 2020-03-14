<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    //
    public function enviarRespuesta($response, $msg, $code = 200)
    {
        $respuesta = [
            'success' => true,
            'data' => $response,
            'message' => $msg,
            'code' => $code
        ];

        return response()->json($respuesta,$code);
    }

    public function enviarError($error, $error_msgs=[], $code=404)
    {
        $respuesta=[
            'success' => false,
            'msg' => $error,
            'code' => $code
        ];

        if(!empty($error_msgs))
        {
            $respuesta['data']= $error_msgs;
        }

        return response()->json($respuesta,$code);

    }
}
