<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_sale', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('sale_id')->nullable(false);
            $table->char('WC_CD', 4)->nullable(false);
            $table->char('WF_CD', 4)->nullable(false);
            $table->char('GP_CD',4)->nullable(false);
            $table->integer('WF_YEAR')->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_sale');
    }
}
