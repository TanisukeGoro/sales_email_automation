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
            'facebook' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'official_position' => ['nullable', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'facebook' => 'Facebook',
            'linkedin' => 'LinkedIn',
            'official_position' => '役職名',
        ];
    }
}
