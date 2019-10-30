<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplieRequest;

class SupplieEditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


     public function show($supplier_id, $supplie_id)
    {
        $supplier = \App\models\Supplier::find($supplier_id);
        $supplie = \App\models\Supplie::find($supplie_id);

        return view('supplie-edit', ['supplier' => $supplier, 'supplie' => $supplie]);
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
        $supplie->name = $request->name;
        $supplie->price = $request->price;
        $supplie->img_path = $path;
        $supplie->save();

        $supplies_controller = new SuppliesController();
        return $supplies_controller->show($supplier_id);
    }
}
