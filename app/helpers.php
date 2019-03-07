<?php

namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait JsonFormRequest
{
    protected function failedValidation(Validator $validator)
    {
        //write your business logic here otherwise it will give same old JSON response
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

trait FormRequestFunctions
{
    public function arrayMessages($messages)
    {
        $result = [];
        foreach ($messages as $key => $msg) {
            if ("string" === gettype($msg)) {
                $result += [$key => $msg];
            } elseif ("array" === gettype($msg)) {
                $msgs = $this->arrayMessages($msg);
                foreach ($msgs as $subKey => $subMsg) {
                    $result += [$key . $subKey => $subMsg];
                }
            }
        }
        return $result;
    }
}

