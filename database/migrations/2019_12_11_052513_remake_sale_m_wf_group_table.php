<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakeSaleMWfGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_m_wf_group', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();

            // sale_id を bigint 型から int 型に変更
            $table->integer('sale_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
