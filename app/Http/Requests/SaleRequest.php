<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            "sale_name"=> "required",
            "kumis"=> "required",
            "supplie"=> "required",
        ];
    }

    public function messages()
    {
        return [
            "sale_name.required"=> "販売会の名前を入力してください",
            "kumis.required"=> "組を少なくとも１つ選択してください",
            "supplie.required"=> "用品を少なくとも１つ選択してください",
        ];
    }
}
