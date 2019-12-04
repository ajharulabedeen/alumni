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

        $events->user_id = Utils::getUserId();
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



}