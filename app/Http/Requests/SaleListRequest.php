<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleListRequest extends FormRequest
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
            'freeword' => ['nullable'],
            'company_large_category_id' => ['nullable'],
            'company_middle_category_id' => ['nullable'],
            'listing_stock_id' => ['nullable'],
            'address' => ['nullable'],
        ];
    }
}
