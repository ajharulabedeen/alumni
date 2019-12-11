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
<<<<<<< HEAD
            $table->bigIncrements('id');            
=======
            $table->bigIncrements('id');
>>>>>>> 59760841e83a879625219e015007d1bded35657b
            $table->string('user_id',512)->nullable();
            $table->float('amount')->nullable();
            $table->string('type_ID', 512)->nullable();
            $table->date('date')->nullable();
            $table->string('payment_method', 512)->nullable();
            $table->string('mobile_number', 512)->nullable();
            $table->string('trx_id', 512)->nullable();
            $table->string('status', 512)->nullable();
<<<<<<< HEAD
=======
            $table->mediumText('notes')->nullable();
            $table->date('approved_date')->nullable();
>>>>>>> 59760841e83a879625219e015007d1bded35657b

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
