<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator;

class PersonalPurchaseSupplieRequest extends FormRequest
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
            "size_value"    =>  "required",
            "color_value"   =>  "required",
            "quantity"      =>  "required|numeric",
        ];
    }

    public function messages()
    {
        return [
            'size_valuerequired' => 'サイズを選択してください',
            'color_value.required' => 'カラーを選択してください',
            'quantity.required' => '数量を入力してください',
            'quantity.numeric' => '半角英数字で入力してください',
        ];
    }

    public function validator(Factory $factory)
    {
        return $factory->make($this->sanitize(), $this->container->call([
            $this,
            'rules',
        ]), $this->messages(), $this->attributes());
    }

    public function sanitize()
    {
        $input = $this->all();

        if (isset($input['quantity'])) {
            $input['quantity'] = mb_convert_kana($input['quantity'],'n');
        }

        $this->replace($input);
            return $input; 
    }
}
