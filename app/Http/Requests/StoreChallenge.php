<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait JsonFormRequest
{
    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator) {
        //write your business logic here otherwise it will give same old JSON response
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

class StoreChallenge extends FormRequest
{
    
    use JsonFormRequest;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'point' => ['required', 'integer', 'min:0'],
            'title' => ['required', 'max:255', 'string'],
            'flag' => [
                'sometimes' => 'required'
            ],
            'link' => ['url'],
            'description' => [],
            'genre' => ['required', 'max:255', 'string'],
            'show_at' => [
                'sometimes',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:today',
            ],
        ];
    }

    public function messages()
    {
        return [
            'point.min' => '포인트는 0 이상 입력이 가능합니다',
        ];
    }

}
