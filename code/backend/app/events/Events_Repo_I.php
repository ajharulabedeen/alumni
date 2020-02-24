<?php

namespace App\events;

use App\events\Events;
use Swift_Events_EventDispatcher;

interface Events_Repo_I
{
    /**
     * @return id  after successfull event creation, primary key of the event will be retuened.
     *
     */
    public function create(Events $events);

    /**
     * @return status boolean; 1 : sucess; 0 : fail.
     */
    public function update(Events $eventsUpdate);

    /**
     * @param   id id of the event not the user ID.
     */
    public function delete($event_id);
    /**
     * @param  order vales : Ascending/Desecending.
     * @param  perPage how mmany evetns perpage will be loaded.
     * @param  start start, from where the it start to load.
     * @return eventsList  List of events will be returned. Just the even title will be retuned. description can be loaded later by the user if needed.
     */

    // public function getAllEvents( $order, $perPage, $start);
    public function getAllEvents($per_page, $sort_by, $sort_on);

    /**
     * @return description description of an event will be given. to save data, only description will be back.
     * @param  event_id   primary key of the event.
     */
    public function getDescriptionNotes($event_id);

    /**
     *
     */
    public function getOneEvent($event_id);

    /**
     * @return int how many events data so far kept.
     */
    public function count_all();

    public function search_event(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key);

    public function search_event_count(string $column_name, string $key);

    public function update_event_basic(EventBasic $eBasic);

    public function update_DescriptionNotes(EventDescriptionNotes $eDescriptionNotes);

    public function assignemnt_event_payment(EventPayment $eventPayment);

//    start : EventPaymentAssingment
    public function assingment_payment_event(EventPayment $eventPayment);

    /**
     * @description does a event has an assigned payment or not.
     * @return string payment id if assigned or a negetive value(-1).
     */
    public function checkPaymentAssingment(string $eventID);

    public function removePaymentAssingment(string $event_id, string $payment_type_id);

//    end : EventPaymentAssingment

//start : event registration
    public function eventRegistration(EventRegistration $eventRegistration);

    public function checkEventRegistration(string $event_id, string $user_id);

    /**
     * @description it will check, if a payment of a event, is done by the user or not.
     * if payment is done, PaymentMobile Object will be returned.
     * @param string $event_id
     * @param string $user_id
     * @return jSON ["status" => "1" (means : found or not) ,
     * "data" => $pm(PaymentMbile),
     * "type_id" => $type_id(payment type id)];
     */
    public function checkPayment(string $event_id, string $user_id);

//end : event registration


    public function getAllRegisteredUser(string $per_page,
                                         string $sort_by,
                                         string $sort_on,
                                         string $column_name,
                                         string $key,
                                         string $event_id);

    public function countSearchRegisteredUser(
        string $column_name,
        string $key,
        string $event_id);

}// class
