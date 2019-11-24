<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment\Payment_Type_Repo_I;
use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentType;
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
        $repoPaymentType = new Payment_Type_Repo_Impl();
        $paymentType = new PaymentType();
        $paymentType->name     = $r->name;

        // $id = $this->paymentTypeRepo->save($pType);
        // $id = $repoPaymentType.create($paymentType);
        $id = $repoPaymentType.create($paymentType);

        return $id;
    }
}//class
