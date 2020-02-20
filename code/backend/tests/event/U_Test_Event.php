<?php

namespace Tests\Unit;

use App\events\EventBasic;
use App\events\EventDescriptionNotes;
use App\events\EventPayment;
use App\events\Events_Repo_Impl;
use App\events\Events;
use App\profile\ProfileBasic;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_Test_Event extends TestCase
{
    public function testMain()
    {
//        $this->dummyDataInsert();//passed
//        error_log($this->create());//passed
//        error_log($this->findOneEvent(3));//passed
//        error_log($this->delete(3));//passed
//        error_log($this->update(4, "fee", "560.00"));//passed.
//        error_log($this->findOneEvent(4)->fee);//passed.
//        error_log($this->getAllEvents(4, "ASC", "end_date"));//passed.
//        error_log($this->getDescriptionNotes(4));//passed.
//        error_log($this->countEvents());//passed.
//        $this->search_event(6, "DESC", "id", "location", "%Dhaka%");//passed.
//        error_log($this->search_event_count("location", "%GUB%"));//passed.
//        $this->eventUpdateNotesDescription();//passed
//        $this->eventbasicUpdate();//passed

        $this->assingment_payment_event();
    }


    public function Event_CRUD()
    {
        error_log("\n Event: CRUD Test Done!\n");

    }

// start : eventPayment
    public function assingment_payment_event()
    {
        $repo = new Events_Repo_Impl();
        $ep = new EventPayment();
        $ep->event_id = "1";
        $ep->payment_type_id = "15";
        $d = $repo->assingment_payment_event($ep);
        dd($d);
    }

// end  : eventPayment


    public function eventUpdateNotesDescription()
    {
        $e = new EventDescriptionNotes();
        $e->id = "1";
        $e->description = "---F R Siddique will lecture!";
        $e->notes = "A Formar Nuclear Scientist!";
        $repo = new Events_Repo_Impl();
        $status = $repo->update_DescriptionNotes($e);
        dd($status);
    }

    public function eventbasicUpdate()
    {
        $e = new EventBasic();
        $e->id = "1";
        $e->title = "Ne of the Event!";
        $e->start_date = "2019-12-04";
        $e->end_date = "2019-12-05";
        $e->location = "DD";
        $e->fee = "500";
        $repo = new Events_Repo_Impl();
        $status = $repo->update_event_basic($e);
        dd($status);
    }

    public function search_event_count($column_name, $key)
    {
        $repo = new Events_Repo_Impl();
        $data = $repo->search_event_count($column_name, $key);
        error_log($data);
    }

    public function search_event($per_page, $sort_by, $sort_on, $column_name, $key)
    {
        $repo = new Events_Repo_Impl();
        $data = $repo->search_event($per_page, $sort_by, $sort_on, $column_name, $key);
        for ($i = 0; $i < 10; $i++) {
            try {
                error_log($data[$i]);
            } catch (\Exception $e) {
                break;
            }
        }
        return $data;
    }

    public function countEvents()
    {
        $repo = new Events_Repo_Impl();
        $data = $repo->count_all();
        error_log($data);
    }

    public function getDescriptionNotes($id)
    {
        $repo = new Events_Repo_Impl();
        $data = $repo->getDescriptionNotes($id);
        error_log("Desc : " . $data['description']);
        error_log("Notes : " . $data['notes']);
//        dd($data);
        return $data;
    }

    public function getAllEvents($per_page, $sort_by, $sort_on)
    {
        $repo = new Events_Repo_Impl();
        $data = $repo->getAllEvents($per_page, $sort_by, $sort_on);
//        print_r($data);
        for ($i = 0; $i < 10; $i++) {
            if ($data[$i] == null) {
                break;
            }
//            error_log($data[$i]->title);
            error_log($data[$i]);
//        }
        }
        return $data;
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
    public function dummyDataInsert()
    {
        for ($x = 0; $x < 1000; $x++) {
            $repoEvent = new Events_Repo_Impl();
            $e = new Events();
            $e->user_id = rand(2, 15);
            $e->title = $this->getTitle();
            $e->start_date = $this->getDate();
            $e->end_date = $this->getDate();
            $e->fee = rand(100, 1000);
            $e->location = $this->getLocation();
            $e->description = $this->getDescription();
            $e->notes = $this->getNotes();
            $e->images = "No Image Available!";
            $id = $repoEvent->create($e);
            error_log("\n" . $id);
        }
    }

    public function getDate()
    {
        $y = rand(2017, 2025);
        $m = rand(1, 9);
        $d = rand(10, 28);
        $date = $y . "-" . "0" . $m . "-" . $d;
        return $date;
    }

    public function getLocation()
    {
        $location = array("Dhaka",
            "Khulna",
            "GUB",
            "Green Garden",
            "Dhaka University Auditoriam",
            "Basundhara Convention Center",
            "IUBAT Meeting Center",
            "Hotel Tiger Garden",
            "Hotel Seraton",
            "Gazipur Safari Park",
            "Padma Resort",
            "Gonoshatho Kendro",
            "NSU Center");
        $index = rand(0, count($location) - 1);
        return $location[$index];
    }

    public function getTitle()
    {
        $location = array("WorkShoop in PHP",
            "Meet Up 2020",
            "GUB Meeting",
            "CSE carnival",
            "Dhaka Fair",
            "Annual Picnic",
            "Workshop in Python",
            "PHP seminar",
            "Pubslishing Research Article",
            "Family Get together",
            "Winter Carity",
            "Blood Donation",
            "NSU Programming Contest");
        $index = rand(0, count($location) - 1);
        return $location[$index];
    }

    public function getDescription()
    {
        $location = array("WorkShoop in PHP Description",
            "Meet Up 2020 Description",
            "GUB Meeting Description",
            "CSE carnival Description",
            "Dhaka Fair Description",
            "Annual Picnic Description",
            "Workshop in Python Description",
            "PHP seminar Description",
            "Pubslishing Research Article Description",
            "Description : Family Get together",
            "Description : Winter Carity",
            "Description : Blood Donation",
            "Description : NSU Programming Contest");
        $index = rand(0, count($location) - 1);
        return $location[$index];
    }

    public function getNotes()
    {
        $location = array("WorkShoop in PHP Notes",
            "Notes : Meet Up 2020 Description",
            "Notes : GUB Meeting Notes",
            "CSE carnival Notes",
            "Dhaka Fair Notes",
            "Annual Picnic Notes",
            "Workshop in Python Notes",
            "PHP seminar Notes",
            "Notes : Research Article Description",
            "Notes - Family Get together",
            "Notes - Winter Carity",
            "Notes : Donation",
            "Notes : Contest");
        $index = rand(0, count($location) - 1);
        return $location[$index];
    }
//    end : dummy event creation


}//class
