<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemakeSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            // id を big_increments 型から increments 型に変更
            $table->increments('id')->change();

            // name を char 型から varchar 型に変更
            // $table->string('name', 32)->change();

            // person_charge を char 型から varchar 型に変更
            // $table->string('person_charge', 32)->change();

            // phone_number を char 型から varchar 型に変更
            // $table->string('phone_number', 15)->change();

            // postal_code を char 型から varchar 型に変更
            // $table->string('postal_code', 9)->change();

            // street_address_1 を char 型から varchar 型に変更
            // $table->string('street_address_1', 32)->change();

            // street_address_2 を char 型から varchar 型に変更
            // $table->string('street_address_2', 32)->change();

        });

        DB::statement('ALTER TABLE `suppliers` MODIFY COLUMN `name` VARCHAR(30);');
        DB::statement('ALTER TABLE `suppliers` MODIFY COLUMN `person_charge` VARCHAR(30);');
        DB::statement('ALTER TABLE `suppliers` MODIFY COLUMN `phone_number` VARCHAR(15);');
        DB::statement('ALTER TABLE `suppliers` MODIFY COLUMN `postal_code` VARCHAR(9);');
        DB::statement('ALTER TABLE `suppliers` MODIFY COLUMN `street_address_1` VARCHAR(30);');
        DB::statement('ALTER TABLE `suppliers` MODIFY COLUMN `street_address_2` VARCHAR(30);');
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
