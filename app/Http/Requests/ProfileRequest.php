<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new User())->getTable())->ignore(auth()->id())],
            'company_name' => ['nullable', 'string'],
            'company_large_category_id' => ['integer'],
            'company_middle_category_id' => ['integer'],
            'company_address' => ['nullable', 'string'],
            'maximum_employees' => ['nullable', 'integer'],
            'hp_adress' => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'company_name' => '会社名',
            'company_large_category_id' => '業種大カテゴリ',
            'company_middle_category_id' => '業種中カテゴリ',
            'company_address' => '会社所在地',
            'maximum_employees' => '従業員数',
            'hp_adress' => '会社HP',
        ];
    }
}
