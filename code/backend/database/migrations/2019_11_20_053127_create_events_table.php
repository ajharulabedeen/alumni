<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('user_id',512)->nullable();
            $table->string('title', 512)->nullable();
            $table->date('start_date', 512)->nullable();
            $table->date('end_date', 512)->nullable();
            $table->float('fee')->nullable();
            $table->string('location', 512)->nullable();
            $table->mediumText('description', 512)->nullable();
            $table->mediumText('notes', 512)->nullable();
            $table->string('images', 512)->nullable();

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
        Schema::dropIfExists('events');
    }
}
