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
        $paymentType->save();
        $id = $paymentType->id;
        return $id;
    }

    public function update(PaymentType $paymentTypeUpdate)
    {


        error_log("Payment Type : Update");
        $updateStatus = false;
        try {
            $payment_type_id = $paymentTypeUpdate->id;
            $paymentTypeOrgin = PaymentType::find($payment_type_id);
            $paymentTypeOrigin = $paymentTypeUpdate;
            $paymentTypeOrigin->update();
            $updateStatus = true;
        } catch (Exception $e) {
            error_log("Payment type Update : failed to read existig profile.");
            return  $updateStatus;
        }
        return (string) $updateStatus;




    }



    public function findPaymentTypeByUser($id)
    {
        error_log(" findPaymentTypeByUser : ");
        $data = PaymentType::where('id', $id)->first();
        return $data;
    }



}
