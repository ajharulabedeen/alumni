<?php
namespace App\payment;

use App\payment\PaymentType;

interface Payment_Type_Repo_I {
    /**
     *  @return id id of the newly created, payment type.
     */
    public function create(PaymentType $paymentType);
}
