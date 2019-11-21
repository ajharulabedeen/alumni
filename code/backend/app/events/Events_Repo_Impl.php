<?php

namespace App\events;

use App\events\Events;

class Events_Repo_Impl implements Events_Repo_I
{
    /**
     *  @return id  after successfull event creation, primary key of the event will be retuened.
     *
     */
    public function create(Events $events)
    {
        error_log("event create : ");
        $id = -1;
        try {
            $events->save();
            $id = $events->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Events About Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }
    /**
     * @return status boolean; 1 : sucess; 0 : fail.
     */
    public function update(Events $events)
    {
        error_log("event update : ");
    }
    /**
     * @param   id id of the event not the user ID.
     */
    public function delete($event_id)
    {
        error_log("Event Delete : ");
    }
    /**
     *  @param  order vales : Ascending/Desecending.
     *  @param  perPage how mmany evetns perpage will be loaded.
     *  @param  start start, from where the it start to load.
     *  @return eventsList  List of events will be returned. Just the even title will be retuned. description can be loaded later by the user if needed.
     */
    public function getAllEvents($order, $perPage, $start)
    {
        error_log("getAllEvents : ");
    }
    /**
     *  @return description description of an event will be given. to save data, only description will be back.
     *  @param  event_id   primary key of the event.
     */
    public function getDescription($event_id)
    {
        error_log("getDescription event");
    }
}//class
