<?php

namespace App\Traits;
use Illuminate\Support\Facades\Validator;
trait RespondsWithHttpStatus
{
    protected function success($message, $data = [], $code = 200)
    {
        return response([
            'code' => $code,
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function error($message = null, $data = [], int $code = 422)
	{
		return response()->json([
            'code' => $code,
			'success' => false,
			'message' => $message,
			'data' => $data
		], $code);
	}

    protected function errorValidation($validator){
            return response()->json([
              'code'  => 422,
              'success'=> false,
              'data' => null,
              'error' =>$validator->errors()
            ],422);
    }
}
