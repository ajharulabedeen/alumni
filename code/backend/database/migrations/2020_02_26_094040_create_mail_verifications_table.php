<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_verifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_email', 512)->nullable();
            $table->string('user_id', 512)->nullable();
            $table->string('status', 512)->nullable();
            $table->string('sent_code', 512)->nullable();
            $table->date('sent_date', 512)->nullable();
            $table->string('received_code', 512)->nullable();
            $table->date('received_date', 512)->nullable();
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
        Schema::dropIfExists('mail_verifications');
    }
}
