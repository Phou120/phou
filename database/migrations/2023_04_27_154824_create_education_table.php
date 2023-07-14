<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('education_institution_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('job_seeker_id');
            $table->year('start_year');
            $table->year('end_year');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('education_institution_id')->references('id')->on('educational_institutions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
};
