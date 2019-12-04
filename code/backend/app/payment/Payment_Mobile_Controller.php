<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment\PaymentMobile;

class Payment_Mobile_Controller extends Controller
{
   public function create(Request $r){
       $ptmobile = new PaymentMobile();
       $ptmobile->user_id = $r->user_id ;
       $ptmobile->amount = $r->amount ;
       $ptmobile->type_ID = $r->type_ID ;
       $ptmobile->date = $r->date ;
       $ptmobile->payment_method = $r->payment_method ;
       $ptmobile->mobile_number = $r->mobile_number ;
       $ptmobile->trx_id = $r->trx_id ;
       $ptmobile->status = $r->status ;
       
       return $ptmobile;
   }
}//class
