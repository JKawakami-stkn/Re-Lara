<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakePersonalSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_sales', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();
            
            // deadline を timestamp 型から datetime 型に変更
            $table->date('deadline')->dedault(null)->nullable()->change();
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
