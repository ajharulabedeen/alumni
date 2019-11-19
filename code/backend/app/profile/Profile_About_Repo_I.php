<?php

namespace App\profile;

use App\profile\ProfileAbout;

interface Profile_About_Repo_I
{
    /**
     *  @param  profileAbout    have to send an new object of "ProfileAbout" model class. Primary key will be set automatcally.
     *  @return id              after successfull save, id : primary key of the entry, will be returned.
     *  @uses   to save "About" of an user.
     */
    public function save(ProfileAbout $profileAbout);
    /**
     * @param   profileAboutUpdate  have to send an existing object oif the "About".
     * @return  updateStatus boolean, 1 : success, 0 : fail.
     * @uses    to update the "About". If any field null value will not be checked. If any null value send from the font end, the field
     *          value be set null.
     */
    public function update(ProfileAbout $profileAboutUpdate);
    /**
     * @param id id of the profile, not the user id.
     * @uses    currently not in use. have to active latter if needed. cause if someone wants to remove the information, he/she can send
     * empty data for updating.
     */
    public function delete($id);
    /**
     * @param id id of the profile, not the user id.
     * @uses    not is use now. cause findOne is security risk. Random id can be send from front end. more rboust method that
     * user_id will be taken from the system : user_id of the current logged user.
     *
     */
    public function findOne($id);
    /**
     * @return  about it will return the "About", of the current logged user. no need to send user_id from font.
     * @param   userID  user id of the current logged user have to send. it can be taken automatically from system by an UtilClass.
     * @uses    "About" of the current logged user will be returned. Generelly, after successfull logging, as initial step,  the current
     *          logged user about "ngOnint" method.
     */
    public function findAboutByUser($userID);
}
