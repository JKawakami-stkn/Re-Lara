<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\M_wf_group;

class PersonalOrdersController extends Controller
{

    public function show(){
        $group_id = "all";
        $radio_name = null;
        $personal_sales = \App\models\Personal_sale::all();
        $this_year_instance = new M_wf_group;
        $this_year_group = $this_year_instance->currentYearGroups();
        \Debugbar::info($personal_sales);
        return view('personal-orders', ['personal_sales' => $personal_sales, 'this_year_group' => $this_year_group, "group_id" => $group_id, "radio_name" => $radio_name]);
    }
    public function load($group_id, $radio_name){
      if($group_id == "all"){
        if($radio_name == "none"){
          \Debugbar::info("id desc");
          $personal_sales = \App\models\Personal_sale::orderBy("id", "desc")->get();
        }elseif($radio_name == "up_sort"){
          \Debugbar::info("asc");
          $personal_sales = \App\models\Personal_sale::orderBy("deadline", "asc")->get();
        }else{
          \Debugbar::info("desc");
          $personal_sales = \App\models\Personal_sale::orderBy("deadline", "desc")->get();
        }
      }else{
        $personal_sales = collect([]);
        $sales_instance = new M_wf_group;
        if($radio_name == "none"){
          $personal_for = \App\models\Personal_sale::orderBy("id", "desc")->get();
        }elseif($radio_name == "up_sort"){
          $personal_for = \App\models\Personal_sale::orderBy("deadline", "asc")->get();
        }else{
          $personal_for = \App\models\Personal_sale::orderBy("deadline", "desc")->get();
        }
        foreach ($personal_for as $personal) {
          if($group_id == $sales_instance->getgroup_id($personal->kids_id)){
            $personal_sales->push($personal);
          }

        }
      }

      $this_year_instance = new M_wf_group;
      $this_year_group = $this_year_instance->currentYearGroups();
      
      return view('personal-orders', ['personal_sales' => $personal_sales, 'this_year_group' => $this_year_group, "group_id" => $group_id, "radio_name" => $radio_name]);

    }
}
