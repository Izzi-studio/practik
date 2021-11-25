<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_employments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        TypeOfEmployment::insert(['name' => 'Full-Time Employees']);
        TypeOfEmployment::insert(['name' => 'Part-Time Employees']);
        TypeOfEmployment::insert(['name' => 'Seasonal Employees']);
        TypeOfEmployment::insert(['name' => 'Temporary Employees']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_cooperations');
    }
}
