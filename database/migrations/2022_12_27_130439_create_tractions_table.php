<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tractions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('feedback')->nullable();
            $table->longText('changes')->nullable();
            $table->longText('actual_user')->nullable();
            $table->longText('average_stay')->nullable();
            $table->longText('actual_sales')->nullable();
            $table->longText('annual_growth')->nullable();
            $table->longText('growth_rate')->nullable();
            $table->longText('growth_linear_consistent')->nullable();
            $table->longText('held_back')->nullable();
            $table->longText('demonstration')->nullable();
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
        Schema::dropIfExists('tractions');
    }
}
