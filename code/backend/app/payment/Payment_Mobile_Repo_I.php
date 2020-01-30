<?php

namespace App\payment;

use App\payment\PaymentMobile;


interface Payment_Mobile_Repo_I
{
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
    //10
    /**
     * @param id id of the payment, not the user id or the payment type id.
     * @param user_id who is approving the payment.
     * @return response string "ok"/"fail" will be back for success.
     */
    public function approve_mobile_payment($user_id, $id);

    //11
    public function search($per_page, $sort_by, $sort_on, $column_name, $key);

    //12
    public function search_count($per_page, $sort_by, $sort_on, $column_name, $key);

    //13
    /**
     *
     * @param $user_id the user, who has approved the mobile payment.
     * @return mixed user name and mobile number will be back.
     */
    public function approved_by_userDeatils($user_id);
}
