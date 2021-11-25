<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormOfEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_of_employments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        FormOfEmployment::insert(['name' => 'Internship']);
        FormOfEmployment::insert(['name' => 'CDD']);
        FormOfEmployment::insert(['name' => 'CDI']);
        FormOfEmployment::insert(['name' => 'Employment exemple']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_of_employments');
    }
}
