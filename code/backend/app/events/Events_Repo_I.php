<?php
namespace events;

use App\events\Events;

interface Events_Repo_I {
    /**
     *  @return id  after successfull event creation, primary key of the event will be retuened.
     *
     */
    public function create(Events $events);
    public function update(Events $events);
    /**
     * @param   id id of the event not the user ID.
     */
    public function delete($event_id);
    /**
     *  @param  order vales : Ascending/Desecending.
     *  @param  perPage how mmany evetns perpage will be loaded.
     *  @param  start start, from where the it start to load.
     *  @return eventsList  List of events will be returned. Just the even title will be retuned. description can be loaded later by the user if needed.
     */
    public function getAllEvents( $order, $perPage, $start);
}
