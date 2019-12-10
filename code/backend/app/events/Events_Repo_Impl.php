<?php

namespace App\events;

use App\events\Events;
// use App\events\Exception;

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
    public function update(Events $eventsUpdate)
    {
        error_log("event update : ");
        $updateStatus = false;
        try {
            $events_id = $eventsUpdate->id;
            $eventsOrgin = Events::find($events_id);
            $eventsOrgin = $eventsUpdate;
            $eventsOrgin->update();
            $updateStatus = true;
        } catch (Exception $e) {
            error_log("Events Update : failed to read existig Education.");
            return  $updateStatus;
        }
        return  $updateStatus;
    }
    /**
     * @param   id id of the event not the user ID.
     */
    public function delete($event_id)
    {
        error_log("Event Delete : ");
        $status = Events::where('id', $event_id)->delete();
        return $status;
    }
    /**
     *  @param  order vales : Ascending/Desecending.
     *  @param  perPage how mmany evetns perpage will be loaded.
     *  @param  start no need for. start, from where the it start to load.
     *  @return eventsList  List of events will be returned. Just the even title will be retuned. description can be loaded later by the user if needed.
     */

    //public function getAllEvents($order, $perPage, $start)
    public function getAllEvents( $per_page, $sort_by, $sort_on)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        return Events::orderBy($sort_on, $order)->paginate($per_page)->all();
    }


    /**
     *  @return description description of an event will be given. to save data, only description will be back.
     *  @param  event_id   primary key of the event.
     */
    public function getDescription($event_id)
    {
        return Events::find($event_id)->description;

    }
    public function getOneEvent($event_id)
    {
        error_log("Find One Event : ");
        return Events::find($event_id);
    }
}//class
