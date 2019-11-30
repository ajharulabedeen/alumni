<?php

namespace Tests\Unit;

use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_PaymentType_Test extends TestCase
{
    public function testMain(){

        // $this->create();//done
        // $this->getAll(10,"ASC","last_date","10");
        // error_log($this->countAll());//done
        // error_log($this->findOnePaymentType(21));//done
        error_log($this->delete(21));//done
    }

    public function delete($id){
        $repo = new Payment_Type_Repo_Impl();
        $status = $repo->delete($id);
        error_log($status);
        return $status;
    }

    public function findOnePaymentType($id){
        $repo = new Payment_Type_Repo_Impl();
        return $repo->findOnePaymentType($id);
    }

    public function countAll(){
        return PaymentType::count();
    }


    public function getAll($per_page, $sort_by, $sort_on, $postID ){
        error_log(" per_page : " . $per_page);
        error_log(" sort_by : " . $sort_by);
        error_log(" sort_on : " . $sort_on);
        if($sort_by=="ASC"){
            $order = "ASC";
        }
        else{
            $order = "DESC";
        }
        // $data = PaymentType::orderBy($sort_on,$order)->stapaginate($per_page)->all();
        // $data = PaymentType::orderBy($sort_on,$order)->sta;
        // print_r($data);
        for ($i=0; $i <10 ; $i++) {
            error_log($data[$i]->last_date);
        }
        // dd($data);
        // return PaymentType::orderBy($sort_on,$order)->paginate($per_page)->all();
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
