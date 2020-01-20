<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator;


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
            'name' => 'required|unique:suppliers,name',
            'person_charge' => 'required',
            'phone_number_1' => 'required|numeric|digits_between:2,4',
            'phone_number_2' => 'required|numeric|digits_between:3,4',
            'phone_number_3' => 'required|numeric|digits_between:3,4',
            'postal_code' => 'required|numeric|digits:7',
            'street_address_1' => 'required',
            'street_address_2' => 'required',
            'street_address_3' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => '取引先名を入力してください',
            'name.unique' => 'この名前の取引先名はすでに登録されています',
            'person_charge.required' => '取引先担当者を入力してください',
            'phone_number_1.required' => '電話番号を入力してください',
            'phone_number_1.digits_between' => '電話番号を正しく入力してください',
            'phone_number_1.numeric' => '半角英数字で入力してください',
            'phone_number_2.required' => '電話番号を入力してください',
            'phone_number_2.digits_between' => '電話番号を正しく入力してください',
            'phone_number_2.numeric' => '半角英数字で入力してください',
            'phone_number_3.required' => '電話番号を入力してください',
            'phone_number_3.digits_between' => '電話番号を正しく入力してください',
            'phone_number_3.numeric' => '半角英数字で入力してください',
            'postal_code.required' => '郵便番号を入力してください',
            'postal_code.numeric' => '半角英数字で入力してください',
            'postal_code.digits' => '郵便番号を正しく入力してください',
            'street_address_1.required' => '都道府県を入力してください',
            'street_address_2.required' => '市町村を入力してください',
            'street_address_3.required' => '番地以下を入力してください',
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

        if (isset($input['postal_code'])) {
            $input['postal_code'] = mb_convert_kana(str_replace(array('-', 'ー', '−', '―', '‐'), '', $input['postal_code']),'n');
        }

        if (isset($input['phone_number_1'])) {
            $input['phone_number_1'] = mb_convert_kana($input['phone_number_1'],'n');
        }

        if (isset($input['phone_number_2'])) {
            $input['phone_number_2'] = mb_convert_kana($input['phone_number_2'],'n');
        }

        if (isset($input['phone_number_3'])) {
            $input['phone_number_3'] = mb_convert_kana($input['phone_number_3'],'n');
        }

        $this->replace($input);
            return $input; 
    }
}
