<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('specific_channels')->nullable();
            $table->longText('marketing_channels')->nullable();
            $table->longText('plan_b')->nullable();
            $table->longText('profit_margin')->nullable();
            $table->longText('scalling_impact')->nullable();
            $table->longText('pivots')->nullable();
            $table->longText('customer_story')->nullable();
            $table->longText('replaceable')->nullable();
            $table->longText('unique_feature')->nullable();
            $table->longText('revenue_stream')->nullable();
            $table->string('status')->default("pending");
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_models');
    }
}
