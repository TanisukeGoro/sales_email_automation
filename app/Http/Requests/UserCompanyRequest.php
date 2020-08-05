<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => ['nullable', 'string'],
            'company_address' => ['nullable', 'string'],
            'maximum_employees' => ['nullable', 'integer'],
            'company_business_description' => ['nullable', 'string'],
            'company_profile' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'email'],
            'hp_url' => ['nullable', 'string'],
            'representative_name' => ['nullable', 'string'],
            'representative_phone_number' => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'company_name' => '会社名',
            'company_address' => '会社所在地',
            'maximum_employees' => '従業員数',
            'company_business_description' => '事業内容',
            'company_profile' => '会社概要',
            'contact_email' => 'お問い合わせメールアドレス',
            'hp_url' => 'ホームページURL',
            'representative_name' => '代表者名',
            'representative_phone_number' => '代表者電話番号',
        ];
    }
}
