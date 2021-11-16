<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Http\Models\Front\Cities;
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
			$table->unsignedBigInteger('country_id');
            $table->timestamps();
        });

		Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });

        Cities::insert(['name'=>'Nice','country_id'=>1]);
        Cities::insert(['name' => 'Nice', 'country_id' =>2]);
        Cities::insert(['name' => 'Paris', 'country_id' =>2]);
        Cities::insert(['name' => 'Rome', 'country_id' =>3]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
