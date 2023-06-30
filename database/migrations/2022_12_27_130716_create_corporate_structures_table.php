<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_structures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('organized_company')->nullable();
            $table->longText('hold_titles')->nullable();
            $table->longText('split_shares')->nullable();
            $table->longText('existing_board')->nullable();
            $table->longText('registered_company')->nullable();
            $table->longText('account_handling')->nullable();
            $table->longText('talent_skills')->nullable();
            $table->longText('selected_founder')->nullable();
            $table->longText('employee_selector')->nullable();
            $table->longText('registered_agent')->nullable();
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
        Schema::dropIfExists('corporate_structures');
    }
}
