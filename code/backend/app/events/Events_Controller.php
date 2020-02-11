<?php

namespace App\Http\Controllers;

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
    public function create(Request $r)
    {
        $events = new events();
//refacot : have to active
//        $events->user_id = Utils::getUserId();
        $events->user_id = '4';
        $events->start_date     = $r->start_date;
        $events->end_date     = $r->end_date;
        $events->description     = $r->description;
        $events->title     = $r->title;
        $events->notes    = $r->notes;
        $events->fee    = $r->fee;
        $events->location  = $r->location;
        $id = $this->eventsRepo->create($events);
        return $id;
    }
    public function update(Request $r)
    {
        $events = new events();
        $events = $this->eventsRepo->getOneEvent($r->id);
        $events->user_id = Utils::getUserId();
        $events->start_date     = $r->start_date;
        $events->end_date     = $r->end_date;
        $events->description     = $r->description;
        $events->title     = $r->title;
        $events->notes    = $r->notes;
        $events->fee    = $r->fee;
        $events->location  = $r->location;
      //  $id = $this->eventsRepo->update($events);
        return ['status' => $this->eventsRepo->update($events)];
    }
    public function delete(Request $r)
    {
        error_log("Event Delete ID : " . $r->id);
        return ['status' => $this->eventsRepo->delete($r->id)];
    }
    public function getDescription(Request $r)
    {
        return ['Description' => $this->eventsRepo->getDescription($r->id)];

    }
    public function getAllEvents(Request $request)
    {
        
        $per_page = $request->per_page;
        $sort_by = $request->sort_by;
        $sort_on = $request->sort_on;
        return $this->eventsRepo->getAllEvents($per_page, $sort_by, $sort_on);
    }



}
