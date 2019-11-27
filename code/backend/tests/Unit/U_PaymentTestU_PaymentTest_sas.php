<?php

namespace Tests\Unit;

use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_PaymentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        error_log("Test 1!");
        $repoPayment = new Payment_Type_Repo_Impl();
        $p = new PaymentType();
        error_log(" Name Before Set : "  . $p->name);

        $p->name = "Seminar 167!";
        $p->description = "nice";
        $p->last_date = "23/3/2019";
        $p->Start_date = "23/3/2019";
        $p->amount = "453";
        

        error_log("Name after set : "  . $p->name);
        dd($repoPayment->create($p));
        $this->assertTrue(true);
    }
    public function Update()
    {
        error_log("Test 2!");

        $repoPayment = new Payment_Type_Repo_Impl();
        $p = new PaymentType();
        $p = $repoPayment->findOnePaymentType(4);

        $p->name = "Seminar 120!";
        $p->description = "nice man";
        $p->last_date = "27/3/2019";
        $p->Start_date = "26/3/2019";
        $p->amount = "500";

        dd($repoPayment->update($p));
        $this->assertTrue(true);


        error_log("Test 2!".$p);

         $this->assertTrue(true);
    }
    public function testBasicTest3()
    {
        error_log("Test 3!");
        $this->assertTrue(true);
    }

}
