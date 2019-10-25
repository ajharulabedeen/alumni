<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',512);
            $table->string('organization_name', 512);
            $table->string('type', 512);
            $table->string('role', 512);
            $table->string('started', 512);
            $table->string('leave', 512);
            $table->string('current_status', 512);
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
        Schema::dropIfExists('profile_jobs');
    }
}
