<?php

namespace App\payment;

use App\payment\PaymentType;
use App\payment\PaymentMobile;

class Payment_Mobile_Repo_Impl {
    public function create (PaymentMobile $ptm) {
        $ptm->save();

        return $ptm->id;

    }
    

}