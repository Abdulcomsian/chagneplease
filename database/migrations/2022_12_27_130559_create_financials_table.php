<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('product_marketing')->nullable();
            $table->longText('marketing_budget')->nullable();
            $table->longText('acquisition_cost')->nullable();
            $table->longText('lifetime_value')->nullable();
            $table->longText('equity_debt')->nullable();
            $table->longText('fundraising')->nullable();
            $table->longText('burn_rate')->nullable();
            $table->longText('time_period')->nullable();
            $table->longText('metrics_key')->nullable();
            $table->longText('stock_options')->nullable();
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
        Schema::dropIfExists('financials');
    }
}
