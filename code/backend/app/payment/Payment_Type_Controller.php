<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment\Payment_Type_Repo_I;
use App\payment\PaymnetType;
use App\Utils\Utils;

class Payment_Type_Controller extends Controller
{
    protected $aboutRepo;

    public function __construct(Payment_Type_Repo_I $paymentTypeRepo)
    {
        // $this->middleware('auth:api');
        $this->paymentTypeRepo = $paymentTypeRepo;
    }
    /**
     * conpleted. afterinsertion id will be backed.
     */
    public function create(Request $r)
    {
        $pType = new PaymentType();
       
            $pType->name     = $r->name;
            $id = $this->paymentTypeRepo->save($pType);
       
        return $id;
    } 



   
}//class
