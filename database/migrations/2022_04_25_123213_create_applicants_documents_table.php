<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicants_profile_id');
            $table->string('first_name')->default('SPECIMEN')->nullable();
            $table->string('middle_name')->default('SPECIMEN')->nullable();
            $table->string('last_name')->default('SPECIMEN')->nullable();
            $table->string('id_type')->nullable();
            $table->string('front_path')->nullable();
            $table->string('back_path')->nullable();
            $table->string('doc_no')->default('SPECIMEN')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('date_of_birth')->default('SPECIMEN')->nullable();
            $table->string('valid_until')->nullable();
            $table->timestamps();
            $table->foreign('applicants_profile_id')
                ->references('id')->on('applicants_profiles')
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
        Schema::dropIfExists('applicants_documents');
    }
}
