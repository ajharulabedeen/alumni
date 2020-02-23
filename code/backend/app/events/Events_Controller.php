<?php

namespace App\Http\Controllers;

use App\events\EventBasic;
use App\events\EventDescriptionNotes;
use App\events\EventPayment;
use App\events\EventRegistration;
use Illuminate\Http\Request;
use App\events\Events_Repo_I;
use App\events\Events_Repo_Impl;
use App\events\Events;
use App\Utils\Utils;

class Events_Controller extends Controller
{

    protected $eventsRepo;

    public function __construct(Events_Repo_I $eventsRepo)
    {
        // $this->middleware('auth:api');
        $this->eventsRepo = $eventsRepo;
    }

    public function eventRegistration(Request $r)
    {
        $er = new EventRegistration();
        //refactor : take current logged user.
        $er->user_id = Utils::getUserId();
        $er->event_id = $r->event_id;
        $er->date = date("Y-m-d h:i:s");
        return $this->eventsRepo->eventRegistration($er);
    }

//    start : EventPayment Assingment
    public function assingment_payment_event(Request $r)
    {
        $ep = new EventPayment();
        $ep->event_id = $r->event_id;
        $ep->payment_type_id = $r->payment_type_id;
        $data = $this->eventsRepo->assingment_payment_event($ep);
        return $data;
    }

    public function checkPaymentAssingment(Request $r)
    {
        return $this->eventsRepo->checkPaymentAssingment($r->event_id);
    }

    public function removePaymentAssingment(Request $r)
    {
        $event_id = $r->event_id;
        $payment_type_id = $r->payment_type_id;
        return $this->eventsRepo->removePaymentAssingment($event_id, $payment_type_id);
    }

//    end : EventPayment Assingment

    public function create(Request $r)
    {
        $events = new events();
//refacot : have to active
//        $events->user_id = Utils::getUserId();
        $events->user_id = '4';
        $events->start_date = $r->start_date;
        $events->end_date = $r->end_date;
        $events->description = $r->description;
        $events->title = $r->title;
        $events->notes = $r->notes;
        $events->fee = $r->fee;
        $events->location = $r->location;
        $id = $this->eventsRepo->create($events);
        return $id;
    }

    public function findOne(Request $r)
    {
        $id = $r->id;
        return $this->eventsRepo->getOneEvent($id);
    }

    public function update_description_notes(Request $r)
    {
        $eb = new EventDescriptionNotes();
        $eb->id = '1';
        $eb->description = $r->description;
        $eb->notes = $r->notes;
        return [$this->eventsRepo->update_DescriptionNotes($eb)];
    }

    public function update_basic(Request $r)
    {
        $eb = new EventBasic();
        //refactor
//        $eb->id = '1';
        $eb->id = $r->id;
        $eb->start_date = $r->start_date;
        $eb->end_date = $r->end_date;
        $eb->title = $r->title;
        $eb->fee = $r->fee;
        $eb->location = $r->location;
        return [$this->eventsRepo->update_event_basic($eb)];
    }

    public function update(Request $r)
    {
        $events = new events();
        $events = $this->eventsRepo->getOneEvent($r->id);
        $events->user_id = Utils::getUserId();
        $events->start_date = $r->start_date;
        $events->end_date = $r->end_date;
        $events->description = $r->description;
        $events->title = $r->title;
        $events->notes = $r->notes;
        $events->fee = $r->fee;
        $events->location = $r->location;
        //  $id = $this->eventsRepo->update($events);
        return ['status' => $this->eventsRepo->update($events)];
    }

    public function delete(Request $r)
    {
        error_log("Event Delete ID : " . $r->id);
        return ['status' => $this->eventsRepo->delete($r->id)];
    }

    public function getDescriptionNotes(Request $r)
    {
        return $this->eventsRepo->getDescriptionNotes($r->id);
    }

    public function getAllEvents(Request $request)
    {
        $per_page = $request->per_page;
        $sort_by = $request->sort_by;
        $sort_on = $request->sort_on;
        return $this->eventsRepo->getAllEvents($per_page, $sort_by, $sort_on);
    }

    public function count_all()
    {
        return ["data" => $this->eventsRepo->count_all()];
    }

    public function search_event(Request $request)
    {
        $per_page = $request->per_page;
        $sort_by = $request->sort_by;
        $sort_on = $request->sort_on;
        $column_name = $request->column_name;
        $key = $request->key;
        return $this->eventsRepo->search_event($per_page, $sort_by, $sort_on, $column_name, $key);
    }

    public function search_event_count(Request $request)
    {
        $column_name = $request->column_name;
        $key = $request->key;
        return ["data" => $this->eventsRepo->search_event_count($column_name, $key)];
    }

    public function checkEventRegistration(Request $r)
    {
        error_log("Check Register:");
        error_log($r->event_id);
//        error_log($r->user_id);
        //refactor
        return $this->eventsRepo->checkEventRegistration($r->event_id, Utils::getUserId());
    }

    public function checkPayment(Request $r)
    {
//        (string $event_id, string $user_id
//        refactor : current logged user id have to put.
        return $this->eventsRepo->checkPayment($r->event_id, Utils::getUserId());
    }

    public function getAllRegisteredUser(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        $column_name = $r->column_name;
        $key = $r->key;
        $event_id = $r->event_id;

//        error_log("getAllRegisteredUser");
//        error_log('$per_page : ' . $per_page);
//        error_log('sort_by : ' . $sort_by);
//        error_log('sort_on : ' . $sort_on);
//        error_log('column_name : ' . $column_name);
//        error_log('key : ' . $key);
//        error_log('event_id : ' . $event_id);


        return $this->eventsRepo->getAllRegisteredUser(
            $per_page,
            $sort_by,
            $sort_on,
            $column_name,
            $key,
            $event_id);

    }

    public function countSearchRegisteredUser(Request $r)
    {
        $column_name = $r->column_name;
        $key = $r->key;
        $event_id = $r->event_id;
        return $this->eventsRepo->countSearchRegisteredUser($column_name, $key, $event_id);
    }

}// class
