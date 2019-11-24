<?php

namespace App\payment;

use App\payment\PaymentType;

class Payment_Type_Repo_Impl implements Payment_Type_Repo_I
{
    /**
     *  @return id id of the newly created, payment type.
     */
    public function create(PaymentType $paymentType)
    {
        $paymentType->save()->id;
        $id = $paymentType->id;
        return $id;
    }
}
