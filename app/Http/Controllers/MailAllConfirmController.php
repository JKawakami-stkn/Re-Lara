<?php

namespace App\Http\Controllers;

use App\models\Sale;
use App\models\M_wf_group;

use Illuminate\Http\Request;

class MailAllConfirmController extends Controller
{
    public function show($sale_id)
    {

        // 販売会
        $sale = Sale::find($sale_id);

        // // 対象者
        // $class = M_wf_group::find($request->group);

        // // 園児一覧
        // $wf_year = (new \DateTime('-3 month'))->format('Y');
        // $kids = M_wf_group::kids($request->group, $wf_year);

        return "全員に送信";
        // return view('mail-class-confirm', compact('sale', 'class', 'kids'));
        
    }
}
