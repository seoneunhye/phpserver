<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HashtagRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '해당 입력값은 필수값입니다.',
            'name.max' => '해시태그명은 최대 10자까지 입력 가능합니다.',
        ];
    }
}
