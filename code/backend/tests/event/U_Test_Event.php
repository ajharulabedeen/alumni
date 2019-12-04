<?php

namespace Tests\Unit;

use App\events\Events_Repo_Impl;
use App\events\Events;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_Test_Event extends TestCase
{
    public function testMain()
    {
        // error_log($this->create());//done

        // $this->getAll(10,"ASC","last_date","10");
        // error_log($this->countAll());
        // error_log($this->findOneEvent(1)->title);//done
        // error_log($this->findOneEvent(2));//done
        // error_log($this->delete(2));//done
        // error_log($this->update(25,"---Update PT Name!"));
        // error_log($this->findOnePaymentType(25)->name);
    }



    public function Event_CRUD()
    {
        error_log("\nPaymentType : CRUD Test Done!\n");

        // ---Create---
        error_log("\n\n---Create---");
        $id = $this->create();
        $pt = $this->findOnePaymentType($id);
        $this->assertEquals($id, $pt->id);
        error_log($pt);

        // ---update---findOne---
        // error_log("\n\n---update---findOne---");
        // $text = "PT Name Updated!";
        // $uStatus = $this->update($id, $text);
        // $this->assertEquals($uStatus, true);
        // $updatedText = $this->findOnePaymentType($id)->name;
        // $this->assertEquals($text, $updatedText);
        // error_log($this->findOnePaymentType($id));

        // ---delete---
        // error_log("\n\n---delete---");
        // $status = $this->delete($id);
        // $this->assertEquals(1, $status);
        // $pt = $this->findOnePaymentType($id);
        // $this->assertEquals($pt, "");

        error_log("\nPaymentType : CRUD Test Done!\n");
    }

    //done
    public function delete($id)
    {
        $repo = new Events_Repo_Impl();
        $status = $repo->delete($id);
        error_log($status);
        return $status;
    }

    //done
    /**
     *  @return PaymentType return a single payment Type.
     */
    public function findOneEvent($id)
    {
        $repo = new Events_Repo_Impl();
        return $repo->getOneEvent($id);
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

    //done
    /**
     * A basic test example.
     * @return void
     */
    public function create()
    {
        $repoEvent = new Events_Repo_Impl();
        $e = new Events();
        $e->user_id = "2";
        $e->title = "MeetUp 22";
        $e->start_date = "2019/04/04";
        $e->end_date = "2019/04/05";
        $e->fee = "500";
        $e->location = "Green Garden";
        $e->description = "We all the previous student will meet at this day!";
        $e->notes = "Please Dont Miss it!";
        $e->images = "No Image Available!";
        $id = $repoEvent->create($e);
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
