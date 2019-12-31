<?php
namespace App\payment;

use App\payment\PaymentMobile;


interface Payment_Mobile_Repo_I {
    //1
    public function create(PaymentMobile $paymentMobile);
    //2
    public function findOnePaymentMobile($id);
    //3
    public function deletePaymentMobile($id);
    //4
    public function update(PaymentMobile $paymentMobileupdate);
    //5
    public function getAllPaymentMobile($per_page, $sort_by, $sort_on);
    //6---Has not implemented
    // public function showAllPaymentMobile($id);
    //7
    public function countPaymentMobile();
    //8
    public function countPaymentMobileByAUser($user_id);
    //9
    public function getAllPaymentMobileByAUser($user_id);
}
