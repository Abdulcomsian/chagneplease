<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExistingFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existing_financials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('exit_goal')->nullable();
            $table->longText('expected_time_frame')->nullable();
            $table->longText('help_exit')->nullable();
            $table->longText('follow_up_round')->nullable();
            $table->longText('valuation')->nullable();
            $table->longText('current_valuation')->nullable();
            $table->longText('current_raisings')->nullable();
            $table->longText('previous_investor')->nullable();
            $table->longText('next_milestone')->nullable();
            $table->longText('investor_help')->nullable();
            $table->longText('total_customer')->nullable();
            $table->longText('operation_country')->nullable();
            $table->longText('founded_date')->nullable();
            $table->longText('full_time_employee')->nullable();
            $table->longText('maturity')->nullable();
            $table->longText('annual_revenue')->nullable();
            $table->longText('projected_revenue')->nullable();
            $table->longText('net_profit')->nullable();
            $table->longText('cach_balance')->nullable();
            $table->longText('funding_request')->nullable();
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
        Schema::dropIfExists('existing_financials');
    }
}
