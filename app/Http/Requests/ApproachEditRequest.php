<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApproachEditRequest extends FormRequest
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
            'staff' => [],
            'email' => ['email'],
            'possibility' => ['between:0,4'],
            'phase' => ['between:0,5'],
            'memo' => [],
        ];
    }

    public function attributes()
    {
        return [
            'staff' => '担当者名',
            'email' => '担当者メール',
            'possibility' => '契約確度',
            'phase' => '営業フェーズ',
            'memo' => 'メモ',
        ];
    }
}
