<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameMWfGroupTableToId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('M_WF_GROUP', function (Blueprint $table) {
            $table->char('GP_CD',4)->nullable(false);
            $table->dropColumn('id');
            $table->primary(['WC_CD','WF_CD','GP_CD','WF_YEAR']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('id', function (Blueprint $table) {
            $table->dropColumn('GP_CD',4);
            $table->integer('id')->nullable(false);
            $table->primary('id');
        });
    }
}
