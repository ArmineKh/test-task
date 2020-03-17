<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->references('id')->on('companies')->onDelete('cascade'); 
            $table->unsignedBigInteger('position_id')->references('id')->on('positions')->onDelete('cascade'); 
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->integer('salary');
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
        Schema::dropIfExists('employes');
    }
}
