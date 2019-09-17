<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_check', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('sale_supplie_id')->nullable(false);
            $table->integer('sku_id')->nullable(false);
            $table->char('WC_CD', 4)->nullable(false);
            $table->char('WF_CD', 4)->nullable(false);
            $table->char('GP_CD', 4)->nullable(false);
            $table->integer('WF_YEAR')->nullable(false);
            $table->dateTime('check_at')->nullable()->default(null);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspection_check');
    }
}
