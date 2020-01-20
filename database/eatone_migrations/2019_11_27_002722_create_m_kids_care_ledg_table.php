<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMKidsCareLedgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_KIDS_CARE_LEDG', function (Blueprint $table) {
            $table->char('LEDG_NUM',30)->nullable(false);
            $table->primary('LEDG_NUM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_KIDS_CARE_LEDG');
    }
}
