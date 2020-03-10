<?php

namespace App\events;

use App\events\Events;
use App\events\EventRegistration;
use App\payment\PaymentMobile;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

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
        $status = Events::where('id', $event_id)->delete();
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
            'id',
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
        $details = Events::select('description', 'notes')->where('id', $event_id)->get();
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
        return Events::find($event_id);
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
            'id',
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
                ->where('id', $eventBasic->id)
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
                ->where('id', $eDescriptionNotes->id)
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

    public function assignemnt_event_payment(EventPayment $eventPayment)
    {
        // TODO: Implement assignemnt_event_payment() method.
    }

//    start : EventPaymentAssingment
    public function assingment_payment_event(EventPayment $eventPayment)
    {
        // TODO: Implement assing_payment_to_event() method.
        error_log("event create : ");
        $id = -1;
        try {
            $eventPayment->save();
            $id = $eventPayment->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Event Payment About Failed.");
            error_log("Saveing Events About Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }

    public function checkPaymentAssingment(string $eventID)
    {
        // TODO: Implement getPaymentConfirmation() method.
        $data = EventPayment::where("event_id", $eventID)->first();
        if ($data == null) {
            $payment_type_id = -1;
        } else {
            $payment_type_id = $data["payment_type_id"];
        }
        return $payment_type_id;
    }

    public function removePaymentAssingment(string $event_id, string $payment_type_id)
    {
        // TODO: Implement removePaymentAssingment() method.
        $status = EventPayment::where('event_id', $event_id)
            ->where('payment_type_id', $payment_type_id)
            ->delete();
        return $status;
    }

//    end : EventPaymentAssingment

//start : event registration

    public function eventRegistration(EventRegistration $eventRegistration)
    {
        // TODO: Implement eventRegistration() method.
        error_log("Event  registration: ");
        $status = "";
        try {
            $check = $this->checkEventRegistration($eventRegistration->event_id, $eventRegistration->user_id);
            if ($check['status'] == "0") {
                $eventRegistration->save();
                $id = $eventRegistration->id;
                $status = ["status" => $id];
            } else if ($check['status'] == "1") {
                $status = ["status" => "registered"];
            }
        } catch (\Exception $e) {
            $saveStatus = false;
            $e->getTrace();
            error_log("Event Registration Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $status;
    }

    public function checkEventRegistration(string $event_id, string $user_id)
    {
        // TODO: Implement checkEventRegistration() method.
        $registered = false;
        $data = EventRegistration::where("event_id", $event_id)->where("user_id", $user_id)->first();
//        error_log($data);
        if ($data == null) {
            $registered = "0";
        } else {
            $registered = "1";
        }
        return ["status" => $registered];
    }

    /**
     * @description to find out, does payment is paid by a user or not.
     * @param string $event_id
     * @param string $user_id
     * @return array
     */
    public function checkPayment(string $event_id, string $user_id)
    {
        //refactor : join column can be used, instead of distinct selection.
        $data = false;
        $type_id = EventPayment::select("payment_type_id")->where("event_id", $event_id)->first()['payment_type_id'];

//        error_log("TypeID : " . $type_id);
//                error_log("uID: " . $user_id);

        $pm = PaymentMobile::where("type_ID", $type_id)->where("user_id", $user_id)->first();
//        error_log($data);
        if ($pm == null) {
            $data = ["status" => "0", "data" => $pm, "type_id" => $type_id];
//            $data = ["status" => "0", "type_id" => $type_id];
        } else {
//            $paid = "1";
            $data = ["status" => "1", "data" => $pm, "type_id" => $type_id];
        }
        return $data;
    }

//end : event registration

    public function getAllRegisteredUser(
        string $per_page,
        string $sort_by,
        string $sort_on,
        string $column_name,
        string $key,
        string $event_id)
    {
        //refactor
        // TODO: Implement getAllRegisteredUser() method.
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }

        $data = DB::table('profile_basics as b')
            ->join('event_registrations',
                'event_registrations.user_id',
                '=',
                'b.user_id')
            ->select(
                'b.dept'
                , 'b.batch'
                , 'b.student_id'
                , 'b.first_name'
                , 'b.last_name'
                , 'b.gender'
                , 'b.email'
                , 'b.phone'
                , 'b.user_id')
            ->where('b.' . $column_name, 'LIKE', $key)
            ->where("event_registrations.event_id", "=", $event_id)
            ->orderBy($sort_on, $order)
//            ->groupBy('profile_basics.user_id')//not working
            ->paginate($per_page);

        $type_id = $email = DB::table('event_payments')
            ->where('event_id', $event_id)
            ->value('payment_type_id');

        error_log("Count Data :" . count($data));

        foreach ($data as $x => $k) {
            $user_id = $data[$x]->user_id;
            $paymentStatus = DB::table('payment_mobiles')
                ->select('id', 'status')
                ->where('event_id', '=', $event_id)
                ->where('user_id', '=', $user_id)
                ->where('type_ID', '=', $type_id)
                ->get();
            if (count($paymentStatus) == 0) {
                $data[$x]->payment_id = 'not_paid';
                $data[$x]->payment_status = 'nan';
            } else {
                try {
                    $data[$x]->payment_id = $paymentStatus[0]->id;
                    $data[$x]->payment_status = $paymentStatus[0]->status;
//                    foreach ($paymentStatus as $m => $n) {
//                        error_log($paymentStatus[$m]->id);
//                        error_log($paymentStatus[$m]->status);
//                    }
                } catch (\Exception $e) {
                    var_dump($paymentStatus);
                }
            }
        }

        return $data;
    }

    public function countSearchRegisteredUser(
        string $column_name,
        string $key,
        string $event_id)
    {
        // TODO: Implement getAllRegisteredUser() method.

        $data = DB::table('profile_basics')
            ->join('event_registrations',
                'event_registrations.user_id',
                '=',
                'profile_basics.user_id')
            ->where("event_registrations.event_id", "=", $event_id)
            ->where('profile_basics.' . $column_name, 'LIKE', $key)
//            ->groupBy('profile_basics.user_id', 'event_registrations.user_id')
            ->count();
        return ["count" => $data];
    }

}//class
