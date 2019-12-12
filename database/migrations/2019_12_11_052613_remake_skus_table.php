<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakeSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skus', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();

            // color を char 型から varchar 型に変更
            // $table->string('color', 32)->change();

            // size を char 型から varchar 型に変更
            // $table->string('size', 32)->change();
        });

        DB::statement('ALTER TABLE `skus` MODIFY COLUMN `color` VARCHAR(30);');

        DB::statement('ALTER TABLE `skus` MODIFY COLUMN `size` VARCHAR(30);');
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
