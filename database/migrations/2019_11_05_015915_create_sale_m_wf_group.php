<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleMWfGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_m_wf_group', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('sale_id')->unsigned()->nullable(false);
            $table->char('GP_CD_id',4)->nullable(false);

            // //外部キー制約
            // $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            // $table->foreign('GP_CD_id')->references('GP_CD')->on('M_WF_GROUP')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_m_wf_group');
    }
}
