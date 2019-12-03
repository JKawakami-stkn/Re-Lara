<?php

namespace App\Http\Controllers;

use App\Models\Sale;

use Illuminate\Http\Request;

class MailClassSelectController extends Controller
{
    public function show($sale_id){
        $groups = \App\models\M_wf_group::currentYearGroups();
        $sale = Sale::find($sale_id);
        return view('mail-class-select',compact("groups","sale"));
    }

}
