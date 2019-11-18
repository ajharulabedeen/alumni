<?php

namespace App\profile;

use App\profile\ProfileAbout;

interface Profile_About_Repo_I
{
    public function save(ProfileAbout $profileAbout);
    /**
     * @return updateStatus boolean, 1 : success, 0 : fail.
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
     * @return about it will return the "About", of the current logged user. no need to send user_id from font.
     */
    public function findAboutByUser($userID);
}
