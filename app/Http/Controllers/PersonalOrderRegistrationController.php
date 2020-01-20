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

        $groups = \App\models\M_wf_group::currentYearGroups();

        return view('personal-order-registration', ['groups' => $groups]);
    }

    public function load($gp_cd){

        // 絞り込みに使用する現在年度を取得
        $wf_year = (new \DateTime('-3 month'))->format('Y');
        $data = \App\models\M_wf_group::kids($gp_cd, $wf_year)
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

        \App\models\Personal_sale::create(['kids_id' => $request->kids_id, 'deadline' => $request->deadline]);

        $personal_orders_controller = new PersonalOrdersController();
        return $personal_orders_controller->show();
    }
}
