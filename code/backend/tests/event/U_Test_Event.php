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
//        error_log($this->create());//passed
//        error_log($this->findOneEvent(3));//passed
//        error_log($this->delete(3));//passed
//        error_log($this->update(4, "fee", "560.00"));//passed.
//        error_log($this->findOneEvent(4)->fee);//passed.
        error_log($this->getAllEvents(4, "ASC", "end_date"));//passed.


//        not tested; have to check.
//         $this->getAll(10,"ASC","last_date","10");
        // error_log($this->countAll());
        // error_log($this->findOneEvent(1)->title);//done
        // error_log($this->findOneEvent(2));//done
        // error_log($this->delete(2));//done
        // error_log($this->update(25,"---Update PT Name!"));
        // error_log($this->findOnePaymentType(25)->name);
    }


    public function Event_CRUD()
    {
        error_log("\n Event: CRUD Test Done!\n");

    }

    public function getAllEvents($per_page, $sort_by, $sort_on)
    {
        $repo = new Events_Repo_Impl();
        $data = $repo->getAllEvents($per_page, $sort_by, $sort_on);
//        print_r($data);
        for ($i = 0; $i < 2; $i++) {
            if ($data[$i] == null) {
                break;
            }
            error_log($data[$i]);
//        }
            return $data;
        }
    }

    public function update($id, $filedName, $data)
    {
        $repo = new Events_Repo_Impl();
        $event = $this->findOneEvent($id);
        $event->$filedName = $data;
        $status = $repo->update($event);
        return $status;
    }

    public function delete($id)
    {
        $repo = new Events_Repo_Impl();
        $status = $repo->delete($id);
        return $status;
    }

    /**
     * @return PaymentType return a single payment Type.
     */
    public function findOneEvent($id)
    {
        $repo = new Events_Repo_Impl();
        return $repo->getOneEvent($id);
    }

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


//    start : dummy event creation
//    end : dummy event creation


}//class
