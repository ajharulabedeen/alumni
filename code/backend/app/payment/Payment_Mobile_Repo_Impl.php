<?php

namespace App\payment;

use App\payment\PaymentType;
use App\payment\PaymentMobile;

class Payment_Mobile_Repo_Impl implements Payment_Mobile_Repo_I{
    public function create (PaymentMobile $ptm) {
        $ptm->save();
        return $ptm->id;

    }
    public function findOnePaymentMobile($id){
        $data = PaymentMobile::where('id', $id)->first();
        return $data;
    }
    
    public function deletePaymentMobile($id){
        $data = PaymentMobile::where('id', $id)->first();
        $data->delete();
        return true;
    }

}