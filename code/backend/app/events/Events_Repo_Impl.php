<?php

namespace App\events;

use App\events\Events;
use Illuminate\Support\Facades\DB;

// use App\events\Exception;

class Events_Repo_Impl implements Events_Repo_I
{
    /**
     * @return id  after successfull event creation, primary key of the event will be retuened.
     *
     */
    public function create(Events $events)
    {
        error_log("event create : ");
        $id = -1;
        try {
            $events->save();
            $id = $events->event_id;
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
            $events_id = $eventsUpdate->event_id;
            $eventsOrgin = Events::find($events_id);
            $eventsOrgin = $eventsUpdate;
            $eventsOrgin->update();
            $updateStatus = true;
        } catch (Exception $e) {
            error_log("Events Update : failed to read existig Education.");
            return $updateStatus;
        }
        return $updateStatus;
    }

    /**
     * @param   id id of the event not the user ID.
     */
    public function delete($event_id)
    {
        error_log("Event Delete : ");
        $status = Events::where('event_id', $event_id)->delete();
        return $status;
    }
    /**
     * @param  order vales : Ascending/Desecending.
     * @param  perPage how mmany evetns perpage will be loaded.
     * @param  start no need for. start, from where the it start to load.
     * @return eventsList  List of events will be returned. Just the even title will be retuned. description can be loaded later by the user if needed.
     */

    //public function getAllEvents($order, $perPage, $start)
    public function getAllEvents($per_page, $sort_by, $sort_on)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        return Events::select(
            'event_id',
            'user_id',
            'title',
            'start_date',
            'end_date',
            'fee',
            'location'
        )->orderBy($sort_on, $order)->paginate($per_page)->all();
    }


    /**
     * @return description description of an event will be given. to save data, only description will be back.
     * @param  event_id   primary key of the event.
     */
    public function getDescriptionNotes($event_id)
    {
        $details = Events::select('description', 'notes')->where('event_id', $event_id)->get();
        if ($details != null) {
            $data = ['description' => $details[0]['description'], 'notes' => $details[0]['notes']];;
        } else {
            $data = ['error' => 'No Data Found!'];
        }
        return $data;
    }

    public function getOneEvent($event_id)
    {
        error_log("Find One Event : " . $event_id);
        return Events::where('event_id',$event_id)->get();
    }

    public function count_all()
    {
        return Events::count();
    }

    public function search_event(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        return Events::select(
            'event_id',
            'user_id',
            'title',
            'start_date',
            'end_date',
            'fee',
            'location'
        )->where($column_name, "LIKE", $key)->orderBy($sort_on, $order)->paginate($per_page)->all();
    }

    public function search_event_count(string $column_name, string $key)
    {
        // TODO: Implement search_event_count() method.
        return Events::where($column_name, "LIKE", $key)->count();
    }

    public function update_event_basic(EventBasic $eventBasic)
    {
        // TODO: Implement update_event_basic() method.
//        error_log($eventBasic->start_date);
        $status = "OK";
        try {
            DB::table('events')
                ->where('event_id', $eventBasic->id)
                ->update(
                    [
                        'title' => $eventBasic->title,
                        'start_date' => $eventBasic->start_date,
                        'end_date' => $eventBasic->end_date,
                        'fee' => $eventBasic->fee,
                        'location' => $eventBasic->location,
                    ]
                );
        } catch (\Exception $e) {
            $status = "FAIL";
        }
        return ["status" => $status];
    }

    public function update_DescriptionNotes(EventDescriptionNotes $eDescriptionNotes)
    {
        // TODO: Implement update_DescriptionNotes() method.
        $status = "OK";
        try {
            DB::table('events')
                ->where('event_id', $eDescriptionNotes->id)
                ->update(
                    [
                        'description' => $eDescriptionNotes->description,
                        'notes' => $eDescriptionNotes->notes,
                    ]
                );
        } catch (\Exception $e) {
            $status = "FAIL";
        }
        return ["status" => $status];
    }

<<<<<<< HEAD
    public function assignemnt_event_payment(EventPayment $eventPayment)
    {
=======
//    start : EventPaymentAssingment
    public function assingment_payment_event(EventPayment $eventPayment)
    {
        // TODO: Implement assing_payment_to_event() method.
        error_log("event create : ");
>>>>>>> 48a83e90bccadea8e767d7125d31e66ca07cd489
        $id = -1;
        try {
            $eventPayment->save();
            $id = $eventPayment->id;
        } catch (Exception $e) {
            $saveStatus = false;
<<<<<<< HEAD
            error_log("Saveing Event Payment About Failed.");
=======
            error_log("Saveing Events About Failed.");
>>>>>>> 48a83e90bccadea8e767d7125d31e66ca07cd489
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }
<<<<<<< HEAD
=======
//    end : EventPaymentAssingment
>>>>>>> 48a83e90bccadea8e767d7125d31e66ca07cd489

}//class
