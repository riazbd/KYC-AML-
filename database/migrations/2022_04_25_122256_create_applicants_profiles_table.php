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
            $table->string('first_name')->default('')->nullable();
            $table->string('middle_name')->default('')->nullable();
            $table->string('last_name')->default('')->nullable();
            $table->string('legal_name')->default('')->nullable();
            $table->string('country')->default('')->nullable();
            $table->string('birth_country')->nullable()->nullable();
            $table->string('state_of_birth')->nullable()->nullable();
            $table->string('nationality')->default('')->nullable();
            $table->string('date_of_birth')->default('')->nullable();
            $table->string('phone')->default('')->nullable();
            $table->string('gender')->default('')->nullable();
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
