<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment\PaymentMobile;
use App\payment\Payment_Mobile_Repo_I;
use App\payment\Payment_Mobile_Repo_Impl;

class Payment_Mobile_Controller extends Controller
{

    protected $paymentMobileRepo;
    public function __construct(Payment_Mobile_Repo_I $paymentMobileRepo)
    {
        // $this->middleware('auth:api');
        $this->paymentMobileRepo = $paymentMobileRepo;
    }

   public function create(Request $r){
    //    $repo = new Payment_Mobile_Repo_Impl();
       $ptmobile = new PaymentMobile();
       $ptmobile->user_id = $r->user_id ;
       $ptmobile->amount = $r->amount ;
       $ptmobile->type_ID = $r->type_ID ;
       $ptmobile->date = $r->date ;
       $ptmobile->payment_method = $r->payment_method ;
       $ptmobile->mobile_number = $r->mobile_number ;
       $ptmobile->trx_id = $r->trx_id ;
       $ptmobile->status = $r->status ;
       
    //    error_log($r);
      
       $id = $this->paymentMobileRepo->create($ptmobile);
       return $id;
   }

   public function findOne(Request $r){
      $id = $r->id;
      $ptmobile = $this->paymentMobileRepo->findOnePaymentMobile($r->id);
      return $ptmobile;
   }

   public function delete(Request $r){
      $id = $r->id;
      $ptmobile = $this->paymentMobileRepo->deletePaymentMobile($r->id);
      return $ptmobile;
   }

   public function update(Request $r){
    $ptmobile = new PaymentMobile();
    $ptmobile = $this->paymentMobileRepo->findOnePaymentMobile($r->id);
    $ptmobile->user_id = $r->user_id ;
    $ptmobile->amount = $r->amount ;
    $ptmobile->type_ID = $r->type_ID ;
    $ptmobile->date = $r->date ;
    $ptmobile->payment_method = $r->payment_method ;
    $ptmobile->mobile_number = $r->mobile_number ;
    $ptmobile->trx_id = $r->trx_id ;
    $ptmobile->status = $r->status ;

    $id = $this->paymentMobileRepo->update($ptmobile);
       return $id;

   }

   public function getAllPaymentMobile(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        return $this->paymentMobileRepo->getAllPaymentMobile($per_page, $sort_by, $sort_on);
    }

    /**
     * 
     */
    public function showAllPaymentMobile(Request $r){
        $id = $r->user_id;
        $user = $this->paymentMobileRepo->showAllPaymentMobile($r->user_id);
        return $user;
    }

    public function countPaymentMobile(){
        $data = $this->paymentMobileRepo->countPaymentMobile();
        return $data;
    }



   

   



}//class