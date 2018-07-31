<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesSectionPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_section_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employees_id');
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
            $table->integer('section_id');
            $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade');
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
        Schema::dropIfExists('employees_section_pivot');
    }
}
