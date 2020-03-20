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
        // $this->getAllPaymentMobile(10,"ASC","payment_method");//done
        // $this->getAllPaymentMobile(10,"DESC","amount");//done
         $this->getMobilePaymentByAUser(4);
        //  error_log($this->countAll());//done
        // error_log($this->findOnePaymentType(25)->amount);//done
//        $data=$this->approve_payment(4, 1);//done
//        $this->assertEquals($data, "ok");//later can be used for assertion.

//        $this->approved_by_userDeatils(4);

//        $this->search(10,"DESC","payment_method","user_id",1);
//        $this->search_count(10,"DESC","payment_method","mobile_number","018");//done
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

    public function approved_by_userDeatils($user_id)
    {
        error_log("\nApproved by User Deatils\n");
        $repo = new Payment_Mobile_Repo_Impl();
        $data = $repo->approved_by_userDeatils($user_id);
        error_log('First Name : ' . $data[0]['first_name']);
        error_log('Last Name : ' . $data[0]['last_name']);
        error_log('Phone : ' . $data[0]['phone']);
//        dd($data);
    }

    public function search_count($per_page, $sort_by, $sort_on, $columnName, $key)
    {
        error_log("\nSearch count\n");
        $repo = new Payment_Mobile_Repo_Impl();
        $data = $repo->search_count($per_page, $sort_by, $sort_on, $columnName, $key);
        dd($data);
    }

    public function search($per_page, $sort_by, $sort_on, $columnName, $key)
    {
        error_log("\nSearch\n");
        $repo = new Payment_Mobile_Repo_Impl();
        $data = $repo->search($per_page, $sort_by, $sort_on, $columnName, $key);


        error_log("Amount" . "---" . "Payment Method");
//        dd($data);
        for ($i = 0; $i < 10; $i++) {
//            error_log($data[$i]->amount  . "---" . $data[$i]->payment_method );
            error_log($data[$i]->user_id . "---" . $data[$i]->id . "---" . $data[$i]->amount . "---" . $data[$i]->payment_method);
        }
    }

    public function delete($id)
    {
        $repo = new Payment_Type_Repo_Impl();
        $status = $repo->delete($id);
        error_log($status);
        return $status;
    }

    /**
     * @return PaymentType return a single payment Type.
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

    public function getAllPaymentMobile($per_page, $sort_by, $sort_on)
    {
        $repo = new Payment_Mobile_Repo_Impl();
        $data = $repo->getAllPaymentMobile($per_page, $sort_by, $sort_on);
        error_log("Amount" . "---" . "Payment Method");
        for ($i = 0; $i < 10; $i++) {
            error_log($data[$i]->amount . "---" . $data[$i]->payment_method);
        }
    }

    public function getMobilePaymentByAUser($user_id)
    {
        $repo = new Payment_Mobile_Repo_Impl();
        $data = $repo->getAllPaymentMobileByAUser($user_id);
        error_log("Amount" . "---" . "Payment Method");
        for ($i = 0; $i < 30; $i++) {
            error_log("Index " . ($i + 1) . ": " . $data[$i]->amount . "---" . $data[$i]->payment_method);
        }
    }

    //done, not a repo method; but working
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
        $data = PaymentMobile::orderBy($sort_on, $order)->paginate($per_page)->all();
        // $data = PaymentType::orderBy($sort_on,$order)->sta;
        // print_r($data);
        error_log("Amount" . "---" . "Payment Method");
        for ($i = 0; $i < 20; $i++) {
            error_log($data[$i]->amount . "---" . $data[$i]->payment_method);
            // error_log($data[$i]->payment_method);
        }
        // dd($data);
        // return PaymentType::orderBy($sort_on,$order)->paginate($per_page)->all();
    }

    //1

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
        $pm->date = rand(1990, 2000) . "-" . "0" . rand(1, 9) . "-" . rand(1, 30);
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


    public function approve_payment($user_id, $id)
    {
        $repoPayment = new Payment_Mobile_Repo_Impl();
        $pt = new PaymentMobile();
        $pt = $this->findOnePaymentType($id);
        $status = $repoPayment->approve_mobile_payment($user_id, $id);
        return $status;
    }


    // -------------- Dummy Data Section -----------------
    public function createDummyData()
    {
        $repo = new Payment_Mobile_Repo_Impl();

        for ($i = 0; $i < 1000; $i++) {
            $pm = new PaymentMobile();

            $pm->user_id = rand(1, 30);
            $pm->amount = rand(100, 2000);
            $pm->type_ID = rand(1, 30);
            $pm->date = rand(1990, 2000) . "-" . rand(1, 12) . "-" . rand(1, 30);
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
