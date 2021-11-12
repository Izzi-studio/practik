<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('form_of_employment');
            $table->string('type_of_employment');
            $table->string('city');
            $table->text('description');
            $table->string('duration');
            $table->enum('status', ['1', '2', '3'])->default('1');
            $table->integer('vacancy_responses');
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
        Schema::dropIfExists('vacancies');
    }
}
