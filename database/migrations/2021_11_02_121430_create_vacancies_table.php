<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancyTable extends Migration
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
            $table->integer('form_of_employment_id');
            $table->integer('type_of_employment_id');
            $table->integer('form_of_cooperation_id');
            $table->integer('duration_id');
            $table->integer('city_id');
            $table->text('description');
            $table->enum('status', ['1', '2', '3'])->default('1');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

		Schema::table('vacancies', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
