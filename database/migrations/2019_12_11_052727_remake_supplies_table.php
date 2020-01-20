<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakeSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplies', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();

            // name を char 型から varchar 型に変更
            // $table->string('name', 32)->change();

            // supplier_id を bigint 型から int 型に変更
            $table->integer('supplier_id')->change();
        });

        DB::statement('ALTER TABLE `supplies` MODIFY COLUMN `name` VARCHAR(30);');
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
