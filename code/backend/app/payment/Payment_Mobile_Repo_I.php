<?php
namespace App\payment;

use App\payment\PaymentMobile;

interface Payment_Mobile_Repo_I {
    public function create(PaymentMobile $paymentMobile);

   
}