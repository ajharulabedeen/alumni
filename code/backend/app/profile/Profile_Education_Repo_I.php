<?php
namespace App\profile;
use App\profile\ProfileEducation;

interface Profile_Education_Repo_I {
    public function save(ProfileEducation $education);
    public function update(ProfileEducation $educationUpdate);
    public function delete($id);
    public function findOne( $id);
    /**
     * to get the all educations of a particular user.
     * Here userID will be taken as Param and educations will be retuened.
     */
    public function getAllEducation( $userID);

}
