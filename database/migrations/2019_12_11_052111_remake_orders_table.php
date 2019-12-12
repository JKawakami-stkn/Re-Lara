<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();

            // supplie_id を bigint 型から int 型に変更
            $table->integer('supplie_id')->change();
        });

        // delivery_at を datetime 型から timestamp 型に変更
        DB::statement('ALTER TABLE `orders` MODIFY COLUMN `delivery_at` TIMESTAMP NULL;');

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
