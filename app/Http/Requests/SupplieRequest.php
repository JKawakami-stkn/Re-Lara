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
     *  バリデーション前処理
     *  @return array
     */
    public function all($keys = null)
    {

        $results = parent::all($keys);

        // 用品名
        if($this->filled('name')) {
            $encoded_name = $this->input('name');
            $decoded_name = mb_convert_encoding($encoded_name, "UTF-8", "HTML-ENTITIES");
            $results['name'] = $decoded_name;
        }

        // 色
        $results_colors = array();
        if($this->filled('colors')){
            foreach( ($this->input('colors')) as $encoded_color ){
                $decoded_color = mb_convert_encoding($encoded_color, 'UTF-8', 'HTML-ENTITIES');
                array_push($results_colors, $decoded_color);
            }
            $results['colors'] = $results_colors;
        }

        // サイズ
        $results_sizes = array();
        if($this->filled('sizes')){
            foreach( ($this->input('sizes')) as $encoded_size ){
                $decoded_size = mb_convert_encoding($encoded_size, 'UTF-8', 'HTML-ENTITIES');
                array_push($results_sizes, $decoded_size);
            }
            $results['sizes'] = $results_sizes;
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
