<?php
/**
 * 返回错误信息
 */
if (! function_exists('error_response')) {
    function error_response($message, $errors = [], $status = 400) {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}

/**
 * api 请求成功时返回信息
 */
if(!function_exists('success_response')){
    function success_response($code=200, $msg="", $data=[]){
        return response()->json([
            'code' => $code,
            'msg'  =>  $msg,
            'data' => $data,
        ]);
    }
}





