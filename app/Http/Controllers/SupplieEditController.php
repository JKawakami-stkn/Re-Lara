<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplieRequest;
use Illuminate\Support\Facades\DB;

class SupplieEditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


     public function show($supplier_id, $supplie_id)
    {
        $supplier = \App\models\Supplier::find($supplier_id);
        $supplie = \App\models\Supplie::find($supplie_id);
        $supplie_division = \App\models\Supplie_division::where('id', '!=', '1')->get();
        return view('supplie-edit', ['supplier' => $supplier, 'supplie' => $supplie, 'supplie_division' => $supplie_division]);
    }

    public function edit($supplier_id, $supplie_id, SupplieRequest $request)
    {
        $request->session()->regenerateToken();

        if ($request->file('img_path') != null) {
            $path = $request->file('img_path')->storeAs('public/spplie_imgs', time().'.jpg');
            $path = str_replace('public/', '', $path);

        }else{
            $path = 'spplie_imgs/no_image.png';
        }

        $supplie = \App\models\Supplie::find($supplie_id);
        $supplie->delete();

        $new_supplie = new \App\models\Supplie;
        $new_supplie->name = $request->name;
        $new_supplie->price = $request->price;
        $new_supplie->img_path = $path;
        $new_supplie->supplier_id = $supplier_id;
        $new_supplie->division_id = $request->division;
        $new_supplie->save();

        $new_supplie_id = \App\models\Supplie::withTrashed()->count();



        // if(!empty(\App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray())){
        //   \Debugbar::addMessage("ある");
        //   \Debugbar::addMessage(\App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray());
        // }else{
        //   \Debugbar::addMessage("ない");
        // }

        #ロンリサクジョ
        if(!empty(\App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray())){

          $delete_id  = \App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray();
          // \Debugbar::addMessage(\App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray()[0]);
          // \Debugbar::addMessage(\App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray());
          $id_v = [];
          foreach($delete_id as $ids){
            foreach ($ids as $id) {
              array_push($id_v, $id);
            }
          }
          // \Debugbar::addMessage(count($id_v));
          for($i = 0; $i < count($id_v); $i++){
            // \Debugbar::addMessage($i);
            $delete = \App\models\Sku::find($id_v[$i]);
            $delete->delete();
          }

        }else{
          // \Debugbar::addMessage("ない");
        }
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
                    'supplie_id' => $new_supplie_id,
                    'color' => $colors[$j],
                    'size' => $sizes[$i]
                ]
            );
          }
        }

        $supplies_controller = new SuppliesController();
        return $supplies_controller->show($supplier_id);
    }
}
