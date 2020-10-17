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
            'company_contact_email' => ['nullable', 'email'],
            'hp_adress' => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'company_contact_email' => 'お問い合わせメールアドレス',
            'hp_adress' => 'ホームページURL',
        ];
    }
}
