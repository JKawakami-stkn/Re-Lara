<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplieRequest;

class SupplieRegistrationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


     public function show($supplier_id)
    {
        $supplier = \App\models\Supplier::find($supplier_id);

        return view('supplie-registration', ['supplier' => $supplier]);
    }
    

    public function store($supplier_id, SupplieRequest $request)
    {
        $request->session()->regenerateToken();

        if ($request->file('img_path') != null) {
            $path = $request->file('img_path')->storeAs('public/spplie_imgs', time().'.jpg');
            $path = str_replace('public/', '', $path);

        }else{
            $path = 'spplie_imgs/no_image.png';
        }

        \Debugbar::info($path);

        DB::table('supplies')->insert(
            [
                'name' => $request->name,
                'supplier_id' => $supplier_id,
                'price' => $request->price,
                'img_path' => $path,
            ]
        );



        $supplies_controller = new SuppliesController();
        return  $supplies_controller->show($supplier_id);

    }

}
