<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterProfileRequest extends FormRequest
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
            'company_name' => ['required', 'string'],
            'official_position' => ['required', 'string'],
            'facebook' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'company_address' => ['required', 'string'],
            'maximum_employees' => ['required', 'integer'],
            'company_large_category_id' => ['required'],
            'company_middle_category_id' => ['required'],
            'company_representative_name' => ['required', 'string'],
            'company_representative_phone_number' => ['required', 'string'],
            'hp_adress' => ['required', 'string'],
            'company_contact_email' => ['required', 'email'],
            'business_description' => ['required', 'string'],
            'company_profile' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'company_name' => '会社名',
            'official_position' => '役職',
            'facebook' => 'Facebook',
            'linkedin' => 'LinkedIn',
            'company_address' => '会社住所',
            'maximum_employees' => '従業員数',
            'company_large_category_id' => '業種大カテゴリ',
            'company_middle_category_id' => '業種中カテゴリ',
            'company_representative_name' => '代表者名',
            'company_representative_phone_number' => '代表者電話番号',
            'hp_adress' => 'ホームページURL',
            'company_contact_email' => 'お問い合わせメールアドレス',
            'business_description' => '事業内容',
            'company_profile' => '会社概要',
        ];
    }
}
