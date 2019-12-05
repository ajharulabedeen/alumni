<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment\PaymentMobile;
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
       $repo = new Payment_Mobile_Repo_Impl();
       $ptmobile = new PaymentMobile();
       $ptmobile->user_id = $r->user_id ;
       $ptmobile->amount = $r->amount ;
       $ptmobile->type_ID = $r->type_ID ;
       $ptmobile->date = $r->date ;
       $ptmobile->payment_method = $r->payment_method ;
       $ptmobile->mobile_number = $r->mobile_number ;
       $ptmobile->trx_id = $r->trx_id ;
       $ptmobile->status = $r->status ;
       
       error_log($r);
       return $repo->create($ptmobile);
   }

   public 
   




}//class
