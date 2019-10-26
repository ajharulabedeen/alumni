<?php
namespace App\profile;
use App\profile\ProfileAbout;

class Profile_About_Repo_Impl implements Profile_About_Repo_I {
    public function save(ProfileAbout $profileAbout){
        error_log("About : save");
        $id = -1;
        try {
            $profileAbout->save();
            $id = $profileAbout->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Profile About Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }
    public function edit(ProfileAbout $profileAboutUpdate){
        error_log("About : edit");
    }
    public function delete($id){
        error_log("About : delete");
        $status = ProfileAbout::where('id', $id)->delete();
        return $status;

    }
    public function findOne( $id){
        error_log("About : findOne");
        $data = ProfileAbout::find($id);
        return $data;
    }
}//class
