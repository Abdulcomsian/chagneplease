<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInBusinessModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_models', function (Blueprint $table) {
            $table->integer("rating")->nullable()->after('plan_id');
            $table->unsignedBigInteger('analyst_id')->nullable()->after('status');
            $table->foreign('analyst_id')->references('id')->on('analyst');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_models', function (Blueprint $table) {
            //
        });
    }
}
