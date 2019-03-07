<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 유효성 검사 반환 한글화
    |--------------------------------------------------------------------------
    |
    | KEY & VALUE 형식의 배열로 정의합니다.
    | KEY에는 유효 검사명을 입력하세요. VALUE는 한글 반환 에러 메시지를 정의해주세요.
    | 속성 정의는 하단의 attribute 정의에서 한글화 시켜주세요.
    |
    */

    'accepted' => ':attribute을(를) 반드시 동의해야 합니다.',
    'active_url' => ':attribute은(는) 유효한 URL이 아닙니다.',
    'after' => ':attribute은(는) 반드시 :date 이후 날짜여야 합니다.',
    'after_or_equal' => ':attribute은(는) 반드시 :date 와 같거나 이후 날짜여야 합니다.',
    'alpha' => ':attribute은(는) 문자만 포함할 수 있습니다.',
    'alpha_dash' => ':attribute은(는) 문자, 숫자, 대쉬(-)만 포함할 수 있습니다.',
    'alpha_num' => ':attribute은(는) 문자와 숫자만 포함할 수 있습니다.',
    'array' => ':attribute은(는) 반드시 배열이어야 합니다.',
    'before' => ':attribute은(는) 반드시 :date 이전 날짜여야 합니다.',
    'before_or_equal' => ':attribute은(는) 반드시 :date 와 같거나 이전날짜여야 합니다.',
    'between' => [
        'numeric' => ':attribute은(는) 반드시 :min에서 :max 사이여야 합니다.',
        'file' => ':attribute은(는) 반드시 :min에서 :max 킬로바이트 사이여야 합니다.',
        'string' => ':attribute은(는) 반드시 :min에서 :max 문자 사이여야 합니다.',
        'array' => ':attribute은(는) 반드시 :min에서 :max 아이템 사이여야 합니다.',
    ],
    'boolean' => ':attribute은(는) 반드시 true 또는 false 여야 합니다.',
    'confirmed' => ':attribute 확인 항목이 일치하지 않습니다.',
    'date' => ':attribute은(는) 유효한 날짜가 아닙니다.',
    'date_equals' => ':attribute은(는) must be a date equal to :date.',
    'date_format' => ':attribute은(는) :format 형식과 일치하지 않습니다.',
    'different' => ':attribute와(과) :other은(는) 반드시 서로 달라야 합니다.',
    'digits' => ':attribute은(는) 반드시 :digits 자릿수여야 합니다.',
    'digits_between' => ':attribute은(는) 반드시 :min에서 :max 자릿수 사이여야 합니다.',
    'dimensions' => ':attribute은(는) has invalid image dimensions.',
    'distinct' => ':attribute은(는) field has a duplicate value.',
    'email' => ':attribute 형식은 유효하지 않습니다.',
    'exists' => '선택된 :attribute은(는) 유효하지 않습니다.',
    'file' => ':attribute은(는) must be a file.',
    'filled' => ':attribute 필드는 필수입니다.',
    'gt' => [
        'numeric' => ':attribute은(는) 반드시 :value 보다 커야 합니다.',
        'file' => ':attribute은(는) 반드시 :value KB 보다 커야 합니다.',
        'string' => ':attribute은(는) 반드시 :value자 보다 커야 합니다.',
        'array' => ':attribute은(는) 반드시 :value개 보다 커야 합니다.',
    ],
    'gte' => [
        'numeric' => ':attribute은(는) 반드시 :value 이상이어야 합니다.',
        'file' => ':attribute은(는) 반드시 :value KB 이상이어야 합니다.',
        'string' => ':attribute은(는) 반드시 :value자 이상이어야 합니다.',
        'array' => ':attribute은(는) 반드시 :value개 이상이어야 합니다.',
    ],
    'image' => ':attribute은(는) 반드시 이미지여야 합니다.',
    'in' => '선택한 :attribute은(는) 잘못된 값입니다.',
    'in_array' => ':other 안에 :attribute이(가) 없습니다.',
    'integer' => ':attribute은(는) 반드시 must be an integer.',
    'ip' => ':attribute은(는) 반드시 must be a valid IP address.',
    'ipv4' => ':attribute은(는) 반드시 must be a valid IPv4 address.',
    'ipv6' => ':attribute은(는) 반드시 must be a valid IPv6 address.',
    'json' => ':attribute은(는) 반드시 must be a valid JSON string.',
    'lt' => [
        'numeric' => ':attribute은(는) 반드시 must be less than :value.',
        'file' => ':attribute은(는) 반드시 must be less than :value kilobytes.',
        'string' => ':attribute은(는) 반드시 must be less than :value characters.',
        'array' => ':attribute은(는) 반드시 must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute은(는) 반드시 must be less than or equal :value.',
        'file' => ':attribute은(는) 반드시 must be less than or equal :value kilobytes.',
        'string' => ':attribute은(는) 반드시 must be less than or equal :value characters.',
        'array' => ':attribute은(는) 반드시 must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute은(는) 반드시 :max 보다 작아야 합니다.',
        'file' => ':attribute은(는) 반드시 :max 킬로바이트보다 작아야 합니다.',
        'string' => ':attribute은(는) 반드시 :max 자리보다 작아야 합니다.',
        'array' => ':attribute은(는) 반드시 :max 아이템보다 작아야 합니다.',
    ],
    'mimes' => ':attribute은(는) 반드시 다음의 파일 타입이어야 합니다: :values.',
    'mimetypes' => ':attribute은(는) must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute은(는) 반드시 :min 보다 커야 합니다.',
        'file' => ':attribute은(는) 반드시 :min 킬로바이트보다 커야 합니다.',
        'string' => ':attribute은(는) 반드시 :min 자리보다 커야 합니다.',
        'array' => ':attribute은(는) 반드시 :max 아이템보다 커야 합니다.',
    ],
    'not_in' => '선택된 :attribute은(는) 유효하지 않습니다.',
    'not_regex' => ':attribute은(는) format is invalid.',
    'numeric' => ':attribute은(는) 반드시 숫자여야 합니다.',
    'present' => ':attribute은(는) field must be present.',
    'regex' => ':attribute 형식은 유효하지 않습니다.',
    'required' => ':attribute 필드는 필수입니다.',
    'required_if' => ':other이(가) :value 일때 :attribute 필드는 필수입니다.',
    'required_unless' => ':attribute은(는) field is required unless :other is in :values.',
    'required_with' => ':values이(가) 있을 경우 :attribute 필드는 필수입니다.',
    'required_with_all' => ':values이(가) 있을 경우 :attribute 필드는 필수입니다.',
    'required_without' => ':values이(가) 없을 경우 :attribute 필드는 필수입니다.',
    'required_without_all' => 'T:values이(가) 없을 경우 :attribute 필드는 필수입니다.',
    'same' => ':attribute와(과) :other은(는) 반드시 일치해야 합니다.',
    'size' => [
        'numeric' => ':attribute은(는) 반드시 :size (이)여야 합니다.',
        'file' => ':attribute은(는) 반드시 :size 킬로바이트여야 합니다.',
        'string' => ':attribute은(는) 반드시 :size 자릿수여야 합니다.',
        'array' => ':attribute은(는) 반드시 :max 개의 아이템을 포함해야 합니다.',
    ],
    'starts_with' => ':attribute must start with one of the following: :values',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid zone.',
    'unique' => ':attribute은(는) 이미 사용중 입니다.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute 형식은 유효하지 않습니다.',
    'uuid' => ':attribute은(는) must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | 사용자 정의 유효성 검사 언어 라인
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    | 여기서 "attribute.rule"규칙을 사용하여 속성에 대한 사용자 정의 유효성 검사 메시지를 지정하여 행의 이름을 지정할 수 있습니다. 이렇게하면 특정 속성 규칙에 대한 특정 사용자 정의 언어 행을 빠르게 지정할 수 있습니다.
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '사용자-정의-메시지',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | 속성 정의
    |--------------------------------------------------------------------------
    |
    | KEY & VALUE 형식의 배열로 정의합니다.
    | KEY에는 유효 속성명을 입력하세요.
    | VALUE는 속성의 한글명을 입력해주세요
    |
    */
    'attributes' => [
        'name' => '이름',
        'email' => '이메일',
        'password' => '비밀번호',
        'password_confirmation' => '비밀번호 확인',
        'title' => '제목',
        'content' => '내용',
        'tag' => '태그'
    ],
];
