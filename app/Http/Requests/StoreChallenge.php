<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChallenge extends FormRequest
{
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
            'genre' => ['required','max:255', 'string'],
            'show_at' => [
                'sometimes',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:today',
            ],
        ];
    }
}
