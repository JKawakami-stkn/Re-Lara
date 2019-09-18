<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'required',
            'person_charge' => 'required',
            'phone_number' => 'required',
            'postal_code' => 'required',
            'street_address_1' => 'required',
            'street_address_2' => 'required',
            'street_address_3' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => '取引先名を入力してください',
            'person_charge.required' => '取引先担当者を入力してください',
            'phone_number.required' => '電話番号を入力してください',
            'postal_code.required' => '郵便番号を入力してください',
            'street_address_1.required' => '住所を入力してください',
            'street_address_2.required' => '住所を入力してください',
            'street_address_3.required' => '住所を入力してください',
        ];
    }
}
