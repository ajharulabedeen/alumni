<?php

namespace App\payment;

use App\payment\PaymentType;
use App\payment\PaymentMobile;
use App\profile\ProfileBasic;
use App\Utils\Utils;

class Payment_Mobile_Repo_Impl implements Payment_Mobile_Repo_I
{
    //1
    public function create(PaymentMobile $ptm)
    {
        $ptm->save();
        return $ptm->id;
    }
    //2
    public function findOnePaymentMobile($id)
    {
        $data = PaymentMobile::where('id', $id)->first();
        return $data;
    }

    //3
    public function deletePaymentMobile($id)
    {
        $data = PaymentMobile::where('id', $id)->delete();
        return $data;
    }

    //4
    public function update(PaymentMobile $ptm)
    {
        $id = $ptm->id;
        $paymentMobileOrgin = PaymentMobile::find($id);
        $paymentMobileOrgin = $ptm;
        $paymentMobileOrgin->update();

        return $ptm->id;
    }

    //5
    public function getAllPaymentMobile($per_page, $sort_by, $sort_on)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        return PaymentMobile::orderBy($sort_on, $order)->paginate($per_page)->all();
    }

    //7
    public function countPaymentMobile()
    {
        return PaymentMobile::count();
    }

    //8
    public function countPaymentMobileByAUser($user_id)
    {
        $data = PaymentMobile::where("user_id", $user_id)->count();
        return $data;
    }

    //9
    /**
     * All the payments done by particular User.
     */
    public function getAllPaymentMobileByAUser($id)
    {
        $data = PaymentMobile::where('user_id', $id)->get();
        return $data;
    }

    //10
    public function approve_mobile_payment($user_id, $id){
        $status = "fail";
        try{
            $paymentMobileOrgin = PaymentMobile::find($id);
            $paymentMobileOrgin->status = 1;
            $paymentMobileOrgin->approved_date = date("Y-m-d h:i:s");
            $paymentMobileOrgin->update();
            $status = "ok";
        }catch (Exception $e){

        }
        return $status;
    }

    //11
    public function search($per_page, $sort_by, $sort_on, $column_name, $key)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        $like='LIKE';
//        $key='%' . $key;
        $key=$key . '%';
        $data = PaymentMobile::where($column_name,$like,$key )->orderBy($sort_on, $order)->paginate($per_page)->all();
        return $data;
    }

    //12
    public function search_count($per_page, $sort_by, $sort_on, $column_name, $key)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        $like='LIKE';
//        $key='%' . $key;
        $key=$key . '%';
        $data = PaymentMobile::where($column_name,$like,$key )->orderBy($sort_on, $order)->count();
        return $data;
    }

    //13

    /**
     * @return user_details user's name and phone number will be returned.
     * @param the $user_id
     *
     */
    public function approved_by_userDeatils($user_id)
    {
        $user_details = ProfileBasic::select('first_name', 'last_name', 'phone')->where('user_id', $user_id )->get();
        return $user_details;
    }
}//class
