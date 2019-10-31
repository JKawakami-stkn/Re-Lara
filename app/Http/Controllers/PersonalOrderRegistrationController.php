<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PersonalOrderRequest;

class PersonalOrderRegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function show(){

        $groups = \App\models\M_wf_group::all();

        return view('personal-order-registration', ['groups' => $groups]);
    }

    public function load($group_id){

        $data =\App\models\M_Kids::where('KIDS_ID', 1)
            ->get()
            ->toArray();

        // jsonを返す
        return response()->json(
            $data,
            200, [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function store(PersonalOrderRequest $request){

        $request->session()->regenerateToken();

        $personal_orders_controller = new PersonalOrdersController();
        return $personal_orders_controller->show();
    }
}
