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

    public function findOnePaymentType(Request $r)
    {
<<<<<<< HEAD
       error_log("PaymentType find ID : " . $r->id);
=======
        error_log("PaymentType find ID : " . $r->id);
>>>>>>> ad4eaa8a2f4f57dfd0abd5279d52bb388f1bc522
        return ['status' => $this->paymentTypeRepo->findOnePaymentType($r->id)];
    }

    public function getAllPaymentType()
    {
        return $this->paymentTypeRepo->getAllPaymentType();
    }


    public function delete(Request $r)
    {
        error_log("PaymentType Delete ID : " . $r->id);
        return ['status' => $this->paymentTypeRepo->delete($r->id)];
    }

}//class
