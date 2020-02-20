<?php

namespace App\Http\Controllers;

use App\events\EventBasic;
use App\events\EventDescriptionNotes;
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

//    start : EventPayment Assingment
    public function assingment_payment_event(Request $r)
    {
        $ep = new EventPayment();
        $ep->event_id = "1";
        $ep->payment_type_id = "9";
        $data = $this->eventsRepo->assing_payment_to_event($ep);
        return $data;
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

}// class
