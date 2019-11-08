<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use App\Http\Requests\PersonalOrderEditRequest;
#PersonalOrderEditRequestがないって言われる
#idをページ間で抱えておく方法
#postのルートの記述が謎

class PersonalOrderEditController extends Controller
{
    public function show($personal_sale_id){
      $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
      $personal_orders = $personal_sale->personal_orders;

      $kids_deadline = \App\models\Personal_sale::where("id", $personal_sale_id)->value("deadline");
      $kids_name = \App\models\M_kids::find($personal_sale->kids_id)->KIDS_NM_KJ;
      $kids_group = \App\models\M_wf_group::getgroup($personal_sale->kids_id);
      return view('personal-order-edit', compact('kids_name','kids_group','kids_deadline','personal_sale_id'));
    }


    public function store(Request $request){
      $request->session()->regenerateToken();
      \App\models\Personal_sale::where("id", $request->id)->update(["deadline" => $request->deadline]);
      $personal_sale_id = $request->id;
      $personal_order_menu = new PersonalOrderMenuController;
      return $personal_order_menu->show($request->id);
    }
}
