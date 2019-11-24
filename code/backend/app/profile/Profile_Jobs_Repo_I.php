<?php

namespace App\profile;

use App\profile\ProfileEducation;

interface Profile_Jobs_Repo_I
{
    /**
     *  @return id id of the new created education.
     */
    public function save(ProfileJobs $job);
    /**
     *  @return updateStatus boolean; 1: succes, 0: falies.
     */
    public function update(ProfileJobs $jobUpdate);
    /**
     * @param id id of the job, not the user id.
     * @uses    currently not in use. have to active latter if needed. cause if someone wants to remove the information, he/she can send
     * empty data for updating.
     */
    public function delete($id);
    /**
     * @param   id id of the jobs, not the user id.
     * @return  status  boolean. 1 : success; 0 : fail.
     * @uses    not is use now. cause findOne is security risk. Random id can be send from front end. more rboust method that
     * user_id will be taken from the system : user_id of the current logged user.
     */
    public function findOne($id);
    /**
     * to get the all educations of a particular user.
     * Here userID will be taken as Param and educations will be retuened.
     */
    public function getAllJobs($userID);
}
