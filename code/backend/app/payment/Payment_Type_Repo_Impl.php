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
        $id = $paymentType->payment_type_id;
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



    public function findOnePaymentType($id)
    {
        error_log(" findOnePaymentType : ");
        $data = PaymentType::where('id', $id)->first();
        return $data;
    }


    public function getAllPaymentType($per_page, $sort_by, $sort_on)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        return PaymentType::orderBy($sort_on, $order)->paginate($per_page)->all();
    }

    public function countAll(){
        return PaymentType::count();
    }

    public function delete($id)
    {
        error_log("paymentType :  Delete");
        $status = PaymentType::where('payment_type_id', $id)->delete();
        return $status;
    }
}
