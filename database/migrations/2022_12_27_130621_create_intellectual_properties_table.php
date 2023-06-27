<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntellectualPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intellectual_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->longText('unique_company')->nullable();
            $table->longText('problem_solve')->nullable();
            $table->longText('legal_risk')->nullable();
            $table->longText('product_liability')->nullable();
            $table->longText('regulatory_risk')->nullable();
            $table->longText('intellectual_property')->nullable();
            $table->longText('developed_intellectual_property')->nullable();
            $table->longText('person_left')->nullable();
            $table->longText('additional_partner')->nullable();
            $table->longText('current_intellectual_assets')->nullable();
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
        Schema::dropIfExists('intellectual_properties');
    }
}
