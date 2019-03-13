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

trait UsesCustomErrorMessage
{
    /**
   * Handle a failed validation attempt.
   *
   * @param  \Illuminate\Contracts\Validation\Validator  $validator
   * @return void
   *
   * @throws \Illuminate\Http\Exceptions\HttpResponseException
   */
    protected function failedValidation(Validator $validator)
    {
        $message = (method_exists($this, 'message')) ? $this->container->call([$this, 'message']) : __('validation.error_message');

        throw new HttpResponseException(
            response()
                ->json([
                    'errors' => $validator->errors(),
                    'message' => $message,
                ], 422)
        );
    }
}

/** Not need */
// trait FormRequestFunctions
// {
//     public function arrayMessages($messages)
//     {
//         $result = [];
//         foreach ($messages as $key => $msg) {
//             if ("string" === gettype($msg)) {
//                 $result += [$key => $msg];
//             } elseif ("array" === gettype($msg)) {
//                 $msgs = $this->arrayMessages($msg);
//                 foreach ($msgs as $subKey => $subMsg) {
//                     $result += [$key . $subKey => $subMsg];
//                 }
//             }
//         }
//         return $result;
//     }
// }
