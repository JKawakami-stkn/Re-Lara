<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TargetRequest extends FormRequest
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
        \Debugbar::info("ok");
        return [
            'kids_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'kids_id.required' => '購入する園児を選択してください',
        ];
    }
}
