<?php

use App\profile\ProfileAbout;

class Profile_About_Repo_Impl implements Profile_About_Repo_I {
    public function save(ProfileAbout $profileAbout){
        error_log("About : save");
    }
    public function edit(ProfileAbout $profileAboutUpdate){
        error_log("About : edit");
    }
    public function delete($id){
        error_log("About : delete");

    }
    public function findOne( $id){
        error_log("About : findOne");

    }
}
