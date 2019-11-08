<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_basics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',512)->nullable();
            $table->string('dept', 512)->nullable();
            $table->string('batch', 512)->nullable();
            $table->string('first_name', 512)->nullable();
            $table->string('student_id', 512)->nullable();
            $table->string('passing_year', 512)->nullable();
            $table->string('last_name', 512)->nullable();
            $table->string('birth_date', 512)->nullable();
            $table->string('gender', 512)->nullable();
            $table->string('blood_group', 512)->nullable();
            $table->string('religion', 512)->nullable();
            $table->string('email', 512)->nullable();
            $table->string('phone', 512)->nullable();
            $table->string('address_present', 512)->nullable();
            $table->string('address_permanent', 512)->nullable();
            $table->string('research_interest', 512)->nullable();
            $table->string('skills', 512)->nullable();
            $table->string('social_media_link', 512)->nullable();
            $table->string('image_address', 512)->nullable();
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
        Schema::dropIfExists('profile_basics');
    }
}
