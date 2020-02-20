<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_type_id',512)->nullable();
            $table->string('event_id',512)->nullable();
            $table->string('event_id', 512)->nullable();
            $table->string('payment_id', 512)->nullable();
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
        Schema::dropIfExists('event_payments');
    }
}
