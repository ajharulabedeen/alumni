<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfileBasic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_basic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',512);
            $table->string('dept', 512);
            $table->string('batch', 512);
            $table->string('student_id', 512);
            $table->string('first_name', 512);
            $table->string('last_name', 512);
            $table->string('birth_date', 512);
            $table->string('gender', 512);
            $table->string('blood_group', 512);
            $table->string('email', 512);
            $table->string('phone', 512);
            $table->string('research_interest', 512);
            $table->string('skills', 512);
            $table->string('image_address', 512);
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
        Schema::dropIfExists('profile_basic');
    }
}
