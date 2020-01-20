<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakeSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();
            
            // name を char 型から varchar 型に変更
            // $table->string('name', 32)->change();
        });

        DB::statement('ALTER TABLE `sales` MODIFY COLUMN `name` VARCHAR(30);');
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
