<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakeSupplieDivisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplie_division', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();

            //$table->string('division_name', 32)->change();
            
            // 不要なカラムを削除
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        DB::statement('ALTER TABLE `supplie_division` MODIFY COLUMN `division_name` VARCHAR(30);');
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
