<?php

namespace Tests\Unit;

use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_PaymentType_Test extends TestCase
{
    public function Main()
    {

        // $this->create();//done
        // $this->getAll(10,"ASC","last_date","10");
        // error_log($this->countAll());//done
        // error_log($this->findOnePaymentType(25)->name);//done
        // error_log($this->delete(25));//done
        // error_log($this->update(25,"---Update PT Name!")); //done
        // error_log($this->findOnePaymentType(25)->name);//done
    }

    public function testPT_CRUD()
    {
        error_log("\nPaymentType : CRUD Test Done!\n");

        // ---Create---
        error_log("\n\n---Create---");
        $id = $this->create();
        $pt = $this->findOnePaymentType($id);
        $this->assertEquals($id, $pt->id);
        error_log($pt);

        // ---update---findOne---
        error_log("\n\n---update---findOne---");
        $text = "PT Name Updated!";
        $uStatus = $this->update($id, $text);
        $this->assertEquals($uStatus, true);
        $updatedText = $this->findOnePaymentType($id)->name;
        $this->assertEquals($text, $updatedText);
        error_log($this->findOnePaymentType($id));

        // ---delete---
        error_log("\n\n---delete---");
        $status = $this->delete($id);
        $this->assertEquals(1, $status);
        $pt = $this->findOnePaymentType($id);
        $this->assertEquals($pt, "");

        error_log("\nPaymentType : CRUD Test Done!\n");
    }

    public function delete($id)
    {
        $repo = new Payment_Type_Repo_Impl();
        $status = $repo->delete($id);
        error_log($status);
        return $status;
    }

    /**
     *  @return PaymentType return a single payment Type.
     */
    public function findOnePaymentType($id)
    {
        $repo = new Payment_Type_Repo_Impl();
        return $repo->findOnePaymentType($id);
    }

    public function countAll()
    {
        return PaymentType::count();
    }

    public function getAll($per_page, $sort_by, $sort_on, $postID)
    {
        error_log(" per_page : " . $per_page);
        error_log(" sort_by : " . $sort_by);
        error_log(" sort_on : " . $sort_on);
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        // $data = PaymentType::orderBy($sort_on,$order)->stapaginate($per_page)->all();
        // $data = PaymentType::orderBy($sort_on,$order)->sta;
        // print_r($data);
        for ($i = 0; $i < 10; $i++) {
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

        $id = $repoPayment->create($p);
        return $id;
    }
    /**
     *  @* @param String text this text will be assingned to the Name of the PaymentType.
     *  @* @param String id PaymentType ID that have to update.
     */
    public function update($id, $text)
    {
        $repoPayment = new Payment_Type_Repo_Impl();
        $pt = new PaymentType();
        $pt = $this->findOnePaymentType($id);

        $pt->name = $text;
        // $p->description = "nice man";
        // $p->last_date = "27/3/2019";
        // $p->Start_date = "26/3/2019";
        // $p->amount = "500";
        $status = $repoPayment->update($pt);
        return $status;
    }
}//class
