<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\JsonFormRequest;
use App\Helpers\FormRequestFunctions;


class StoreChallenge extends FormRequest
{
    use JsonFormRequest;
    use FormRequestFunctions;

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
            'flag' => ['required', 'string'],
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
        // crate post sub array to key value
        return $this->arrayMessages([
            'point' => [
                '.required' => 'point가 비여있습니다.',
                '.min' => '포인트는 :min 이상 입력이 가능합니다.',
                '.integer' => '포인트는 정수만 입력이 가능합니다.',
            ],
            'title' => [
                '.required' => 'title이 비여있습니다.',
                '.max' => 'title은 :max 이하로 입력이 가능합니다.',
                '.string' => 'title은 문자열만 입력이 가능합니다.',
            ],
            'flag' => 'flag는 문자열만 입력이 가능합니다.',
            'link' => '올바르지않은 url 타입입니다.',
            'genre' => [
                '.required' => 'genre가 비여있습니다.',
                '.max' => 'genre는 :max 이하로 입력이 가능합니다.',
                '.string' => 'genre는 문자열만 입력이 가능합니다.',
            ],
            'show_at' => [
                '.date_format' => '시간은 ('.date('Y-m-d H:i:s').')형식으로 입력이 가능합니다.',
                '.after_or_equal' => '현재시간보다 이전시간으로 설정 하실 수 없습니다.',
            ]
        ]);
    }
}
