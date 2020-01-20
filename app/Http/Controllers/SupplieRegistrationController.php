<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplieRequest;
use Illuminate\Database\Eloquent\MassAssignmentException;

class SupplieRegistrationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


     public function show($supplier_id)
    {
        $supplier = \App\models\Supplier::find($supplier_id);
        $supplie_division = \App\models\Supplie_division::where('id', '!=', '1')->get();

        return view('supplie-registration', ['supplier' => $supplier, 'supplie_division' => $supplie_division]);
    }


    public function store($supplier_id, SupplieRequest $request)
    {
        $request->session()->regenerateToken();

        // 画像保存処理
        if ($request->file('img_path') != null) {
            $path = $request->file('img_path')->storeAs('public/spplie_imgs', time().'.jpg');
            $path = str_replace('public/', '', $path);

        }else{
            $path = 'spplie_imgs/no_image.png';
        }

        $create_data = \App\models\Supplie::create(
            [
                'name' =>  $request->name,
                'supplier_id' => $supplier_id,
                'price' => $request->price,
                'img_path' => $path,
                'division_id' => $request->division
            ]
        );
        #\Debugbar::info($create_data);
        $supplie_id = $create_data->id;
        #sku登録
        $colors = $request->colors;
        $sizes = $request->sizes;
        if($colors ==  null){
          $colors = ["なし"];
        }
        if($sizes ==  null){
          $sizes = ["なし"];
        }
        for($i = 0; $i < count($sizes);$i++){
          for($j = 0;$j < count($colors); $j++){
            DB::table('skus')->insert(
                [
                    'supplie_id' => $supplie_id,
                    'color' => $colors[$j],
                    'size' => $sizes[$i]
                ]
            );
          }
        }




        $supplies_controller = new SuppliesController();
        return  $supplies_controller->show($supplier_id);

    }

}
