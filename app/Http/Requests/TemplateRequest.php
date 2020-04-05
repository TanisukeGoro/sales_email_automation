<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'company' => ['required'],
            'department' => ['required'],
            'subject' => ['required'],
            'short_content' => ['required'],
            'long_content' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'テンプレート名',
            'email' => 'メールアドレス',
            'company' => '会社名',
            'department' => '部署名',
            'subject' => '件名',
            'short_content' => '内容(短文)',
            'long_content' => '内容(長文)',
        ];
    }
}
