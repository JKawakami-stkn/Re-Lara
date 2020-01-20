<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalOrderRequest extends FormRequest
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
            'deadline' => 'required',
            'kids_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'deadline.required' => '締め切りを入力してください',
            'kids_id.required' => '購入する園児を選択してください',
        ];
    }
}
