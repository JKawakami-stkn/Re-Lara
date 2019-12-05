<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    use SoftDeletes;

    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function Supplie()
    {
        return $this->belongsToMany('App\models\Supplie');
    }


    public function sale_m_wf_group($id,$kumis)
    {
        if(DB::table('sale_m_wf_group')->where('sale_id',$id)->exists()){
            //値がある場合の処理
            DB::table('sale_m_wf_group')->where('sale_id', '=', $id)->delete();
            foreach($kumis as $kumi){
                \DB::table('sale_m_wf_group')->insert([
                    'sale_id' => $id,
                    'GP_CD_id'=> $kumi
                ]);
            }
        }else{
            //値がない場合の処理
            foreach($kumis as $kumi){
                \DB::table('sale_m_wf_group')->insert([
                    'sale_id' => $id,
                    'GP_CD_id'=> $kumi
                ]);
            }
        }
    }

    public function get_orders()
    {
        return $this->hasMany('App\models\Order');
    }

    public function get_sale_m_wf_group($sale_id)
    {
        return DB::table('sale_m_wf_group')
        ->join('sales', 'sale_m_wf_group.sale_id', '=', 'sales.id')
        ->join('eatone.m_wf_group', 'sale_m_wf_group.GP_CD_id', '=', 'eatone.m_wf_group.GP_CD')
        ->where('sales.id','=',$sale_id)
        ->get();
    }

}
