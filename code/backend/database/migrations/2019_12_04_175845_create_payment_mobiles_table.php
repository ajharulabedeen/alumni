<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_mobiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',512)->nullable();
            $table->float('amount')->nullable();
            $table->string('type_ID', 512)->nullable();
            $table->date('date')->nullable();
            $table->string('payment_method', 512)->nullable();
            $table->string('mobile_number', 512)->nullable();
            $table->string('trx_id', 512)->nullable();
            $table->string('status', 512)->nullable();
            $table->mediumText('notes')->nullable();
            $table->date('approved_date')->nullable();
            $table->date('approved_by')->nullable();

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
        Schema::dropIfExists('payment_mobiles');
    }
}
