<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplieRequest extends FormRequest
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
     *  バリデーション前処理.
     *  @return array
     */
    public function all($keys = null)
    {

        $results = parent::all($keys);

        if($this->filled('name')) {
            $encoded_name = $this->input('name');
            $decoded_name = mb_convert_encoding($encoded_name, "UTF-8", "HTML-ENTITIES");
            $results['name'] = $decoded_name;
        }

        return $results;
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
            'price' => 'required|integer',
            'sizes.*' => 'required',
            'colors.*' => 'required'
        ];
    }
}
