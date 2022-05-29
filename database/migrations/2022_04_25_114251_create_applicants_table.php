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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kyc_level_id')->default(1);
            $table->string('applicant_unique_id', 250)->unique();
            $table->string('applicant_extrnal_unique_id', 250)->unique();
            $table->string('access_token', 250)->unique()->nullable();
            $table->dateTime('access_token_creation_date')->nullable();
            $table->string('created_for')->nullable();
            $table->string('email', 250)->unique()->nullable();
            $table->string('phone')->default('')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->boolean('is_approved')->default(0)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kyc_level_id')->references('id')->on('kyc_levels')->onDelete('cascade');
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
