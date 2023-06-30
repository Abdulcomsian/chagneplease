<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('market_opportunity')->nullable();
            $table->longText('market_share')->nullable();
            $table->longText('customer')->nullable();
            $table->longText('time_taken')->nullable();
            $table->longText('figures')->nullable();
            $table->longText('pr_strategy')->nullable();
            $table->longText('aspire')->nullable();
            $table->longText('least_like')->nullable();
            $table->longText('right_time')->nullable();
            $table->longText('strategy')->nullable();
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
        Schema::dropIfExists('markets');
    }
}
