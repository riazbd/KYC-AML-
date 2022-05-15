<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->string('first_name')->default('');
            $table->string('middle_name')->default('');
            $table->string('last_name')->default('');
            $table->string('legal_name')->default('');
            $table->string('country')->default('');
            $table->string('birth_country')->nullable();
            $table->string('state_of_birth')->nullable();
            $table->string('nationality')->default('');
            $table->string('date_of_birth')->default('');
            $table->string('phone')->default('');
            $table->string('gender')->default('');
            $table->timestamps();
            $table->foreign('applicant_id')
                ->references('id')->on('applicants')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants_profiles');
    }
}
