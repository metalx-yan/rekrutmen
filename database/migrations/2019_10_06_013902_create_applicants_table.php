<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nik')->unique();
            $table->string('name');
            $table->text('address');
            $table->string('place_of_birth');
            $table->date('date_of_birth')->nullable();
            $table->string('telp');
            $table->boolean('gender')->nullable();
            $table->boolean('status')->nullable();
            $table->string('religion');
            $table->string('email')->unique();
            $table->string('resume')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
