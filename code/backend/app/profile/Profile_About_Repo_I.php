<?php
namespace App\profile;
use App\profile\ProfileAbout;

interface Profile_About_Repo_I {
    public function save(ProfileAbout $profileAbout);
    /**
     * @return updateStatus boolean, 1 : success, 0 : fail.
     */
    public function update(ProfileAbout $profileAboutUpdate);
    public function delete($id);
    public function findOne( $id);
    public function findAboutByUser( $userID );
}
