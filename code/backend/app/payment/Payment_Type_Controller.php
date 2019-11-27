<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment\Payment_Type_Repo_I;
use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentType;
use App\Utils\Utils;

class Payment_Type_Controller extends Controller
{
    protected $paymentTypeRepo;

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
        $paymentType = new PaymentType();
        $paymentType->name     = $r->name;
        $paymentType->start_date     = $r->start_date;
        $paymentType->last_date     = $r->last_date;
        $paymentType->description     = $r->description;
        $paymentType->amount     = $r->amount;
        $id = $this->paymentTypeRepo->create($paymentType);
        return $id;
    }


    public function update(Request $r)
    {
        $paymentType = new paymentType();
        $paymentType = $this->paymentTypeRepo->findOnePaymentType($r->id);
        $paymentType->name     = $r->name;
        $paymentType->start_date     = $r->start_date;
        $paymentType->last_date     = $r->last_date;
        $paymentType->description     = $r->description;
        $paymentType->amount     = $r->amount;
        return ['status' => $this->paymentTypeRepo->update($paymentType)];
    }

}//class
