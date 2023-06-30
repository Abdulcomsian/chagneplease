<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('funds_allocated')->nullable();
            $table->longText('spent')->nullable();
            $table->longText('expansion')->nullable();
            $table->longText('not_recieved_money')->nullable();
            $table->longText('asset_invested')->nullable();
            $table->longText('milestones')->nullable();
            $table->longText('biggest_risks')->nullable();
            $table->longText('raising_capitals')->nullable();
            $table->longText('fundraising_efforts')->nullable();
            $table->longText('personal_expenses')->nullable();
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
        Schema::dropIfExists('funds');
    }
}
