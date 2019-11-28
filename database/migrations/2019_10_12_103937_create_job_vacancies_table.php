<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start');
            $table->date('end');
            $table->string('name');
            $table->string('slug');
            $table->string('room')->nullable();
            $table->date('interviewdate')->nullable();
            $table->time('interviewtime')->nullable();
            $table->boolean('status')->default(1); 
            $table->timestamps();
        });

        Schema::table('applicants', function (Blueprint $table) {
            $table->unsignedBigInteger('job_vacancy_id');

            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_vacancies');
    }
}
