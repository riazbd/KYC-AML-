<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('account_name')->nullable();
            $table->string('public_business_name')->nullable();
            $table->string('company_number')->nullable();
            $table->string('country')->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('business_website')->nullable();
            $table->string('legal_mail')->nullable();
            $table->boolean('is_regulated')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_details');
    }
}
