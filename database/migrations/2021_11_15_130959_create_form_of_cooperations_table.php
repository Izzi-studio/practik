<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormOfCooperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_of_cooperations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        FormOfCooperation::insert(['name' => 'Compagny']);
        FormOfCooperation::insert(['name' => 'Laoratory']);
        FormOfCooperation::insert(['name' => 'Fondation']);
        FormOfCooperation::insert(['name' => 'Cooperation']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_of_cooperations');
    }
}
