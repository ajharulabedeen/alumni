<?php

namespace Tests\Unit;

use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_PaymentType_Test extends TestCase
{
    public function testMain(){

        $this->create();
    }

    public function getAll(Request $request){
        $per_page = $request->per_page;
        $sort_by = $request->sort_by;
        $sort_on = $request->sort_on;
        $postID = $request->postID;

        if($sort_by=="ASC"){
            $order = "ASC";
        }
        else{
            $order = "DESC";
        }
        return Expanses::where("post_id",$postID)->orderBy($sort_on,$order)->paginate($per_page)->all();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function create()
    {
        $repoPayment = new Payment_Type_Repo_Impl();
        $p = new PaymentType();
        $p->name = "MeetUp 22";
        $p->description = "Picnic";
        $p->start_date = "2022-06-01";
        $p->last_date = "2022-06-07";
        $p->amount = "700";

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
    public function BasicTest3()
    {
        error_log("Test 3!");
        $this->assertTrue(true);
    }



}//class
