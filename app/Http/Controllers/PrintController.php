<?php

namespace App\Http\Controllers;
use \App\models\Sale;
use \App\models\Order;
use \App\models\Supplie;
use \App\models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function show($sale_id){

        // 販売会
        $sale = Sale::find($sale_id);

        // 注文情報取得
        $orders = DB::table('orders')
            //->whereNotNull('orders.deleted_at')
            ->where('orders.sale_id', '=', $sale_id)
            ->join('sales', 'orders.sale_id', '=', 'sales.id')
            ->join('supplies', 'orders.supplie_id', '=', 'supplies.id')
            ->join('skus', 'orders.sku_id', '=', 'skus.id')
            ->join('suppliers', 'supplies.supplier_id', '=', 'suppliers.id')
            ->select('orders.deleted_at', 'orders.sale_id', 'suppliers.id as supplier_id','suppliers.name as supplier_name', 'suppliers.person_charge as supplier_person_charge', 'supplies.name as supplie_name', 'supplies.supplier_id', 'skus.id as sku_id', 'skus.color', 'skus.size')
            ->get();

        $skus = $orders->unique('sku_id');

        $suppliers = $orders->unique('supplier_id');

        return view('print', ['sale'=>$sale, 'suppliers'=>$suppliers, 'orders'=>$orders, 'skus'=>$skus]);
        
    }
}
