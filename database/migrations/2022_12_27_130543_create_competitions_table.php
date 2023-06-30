<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('competitors')->nullable();
            $table->longText('advantages')->nullable();
            $table->longText('disadvantages')->nullable();
            $table->longText('barriers')->nullable();
            $table->longText('letting_down')->nullable();
            $table->longText('competitors_not_done')->nullable();
            $table->longText('differ_feature')->nullable();
            $table->longText('compare_price')->nullable();
            $table->longText('compare_service')->nullable();
            $table->longText('customer_satisfaction')->nullable();
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
        Schema::dropIfExists('competitions');
    }
}
