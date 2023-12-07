<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 권한 검사 로직을 추가할 수 있음
        // 특정 사용자만 요청을 할 수 있도록 하려면 여기에 로직 추가
        // true 로 설정해야 모든 사용자가 폼 리퀘스트 사용할 수 있음
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
            'name' => 'required|max:15',
            'description' => 'required|max:50',
            'price' => 'required|integer|max:100000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '해당 입력값은 필수값입니다.',
            'name.max' => '상품명은 최대 15자까지 입력 가능합니다.',
            'description.max' => '상품 설명은 최대 50자까지 입력 가능합니다.',
            'description.required' => '해당 입력값은 필수값입니다.',
            'price.integer' => '가격은 정수여야 합니다.',
            'price.max' => ' 상품가격은 최대 10만원 까지 입력 가능합니다.',
            'price.required' => '해당 입력값은 필수값입니다.',
        ];
    }
}
