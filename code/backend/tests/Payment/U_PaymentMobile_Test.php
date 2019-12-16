<?php

namespace Tests\Unit;

use App\payment\Payment_Mobile_Repo_Impl;
use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentMobile;
use App\payment\PaymentType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_PaymentMobile_Test extends TestCase
{
    public function testMain()
    {

        // error_log($this->create());//done
        // $this->getAll(10,"ASC","payment_method", "20");//done
        // $this->getAll(10,"DESC","amount", "20");//done

        error_log($this->countAll());

        // error_log($this->findOnePaymentType(25)->amount);
        // error_log($this->delete(25));
        // error_log($this->update(25,"2500"));
        // error_log($this->findOnePaymentType(25)->amount);//after update to see the result.
        // error_log($this->findOnePaymentType(25)->date);//done
        //----------------------------------
        // $this->createDummyData();//
    }

    public function PT_CRUD()
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
        $repo = new Payment_Mobile_Repo_Impl();
        return $repo->findOnePaymentMobile($id);
    }

    public function countAll()
    {
        return PaymentMobile::count();
    }

    //done
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
        $data = PaymentMobile::orderBy($sort_on,$order)->paginate($per_page)->all();
        // $data = PaymentType::orderBy($sort_on,$order)->sta;
        // print_r($data);
        error_log( "Amount" . "---" . "Payment Method");
        for ($i = 0; $i < 10; $i++) {
            error_log($data[$i]->amount  . "---" . $data[$i]->payment_method);
            // error_log($data[$i]->payment_method);
        }
        // dd($data);
        // return PaymentType::orderBy($sort_on,$order)->paginate($per_page)->all();
    }

    /**
     * A basic test example.
     *
     * @return id
     */
    public function create()
    {
        $repo = new Payment_Mobile_Repo_Impl();
        $pm = new PaymentMobile();
        $pm->user_id = rand(1, 30);
        $pm->amount = rand(100, 2000);
        $pm->type_ID = rand(1, 30);
        $pm->date =  rand(1990, 2000) . "-" . "0".rand(1, 9) . "-" . rand(1, 30);
        $pm->payment_method = $this->getMethod();
        $pm->mobile_number = $this->getPhoneNumber();
        $pm->trx_id = rand(1000000, 5000000);
        $pm->status = rand(0, 3);
        $id = $repo->create($pm);
        error_log($id);
        return $id;
    }

    /**
     *  @* @param String text this text will be assingned to the Name of the PaymentType.
     *  @* @param String id PaymentType ID that have to update.
     */
    public function update($id, $amount)
    {
        $repoPayment = new Payment_Mobile_Repo_Impl();
        $pt = new PaymentMobile();
        $pt = $this->findOnePaymentType($id);

        $pt->amount = $amount;
        // $p->description = "nice man";
        // $p->last_date = "27/3/2019";
        // $p->Start_date = "26/3/2019";
        // $p->amount = "500";
        $status = $repoPayment->update($pt);
        return $status;
    }

    // -------------- Dummy Data Section -----------------
    //d
    public function createDummyData()
    {
        $repo = new Payment_Mobile_Repo_Impl();

        for ($i = 0; $i < 1000; $i++) {
            $pm = new PaymentMobile();

            $pm->user_id = rand(1, 30);
            $pm->amount = rand(100, 2000);
            $pm->type_ID = rand(1, 30);
            $pm->date =  rand(1990, 2000) . "-" . rand(1, 12) . "-" . rand(1, 30);
            $pm->payment_method = $this->getMethod();
            $pm->mobile_number = $this->getPhoneNumber();
            $pm->trx_id = rand(1000000, 5000000);
            $pm->status = rand(0, 3);

            $id = $repo->create($pm);

            error_log($id);
        } //for

    }

    /**
     * Payment method.
     */
    public function getMethod()
    {
        $dept = array("bKash", "Rocket", "uKash", "SureKash");
        $index = rand(0, count($dept) - 1);
        return $dept[$index];
    }

    public function getPhoneNumber()
    {
        $phone = 0;
        for ($i = 0; $i < 11; $i++) {
            $phone .= rand(0, 10);
        }
        // error_log($phone);
        return $phone;
    }
}//class
