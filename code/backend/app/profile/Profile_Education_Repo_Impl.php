<?php

namespace App\profile;

use App\profile\ProfileEducation;

class Profile_Education_Repo_Impl implements Profile_Education_Repo_I
{
    public function save(ProfileEducation $education)
    {
        error_log("Education :  Save");
        $id = -1;
        try {
            $education->save();
            $id = $education->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Post Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }
    public function update(ProfileEducation $educationUpdate)
    {
        error_log("Education :  Update");
        $updateStatus = false;
        try {
            $education_id = $educationUpdate->id;
            $educationOrgin = ProfileEducation::find($education_id);
            $educationOrgin = $educationUpdate;
            $educationOrgin->update();
            $updateStatus = true;
        } catch (Exception $e) {
            error_log("Profile Education Update : failed to read existig Education.");
            return  $updateStatus;
        }
        // return  ["updateStatus" => $updateStatus];
        return  $updateStatus;
    }
    public function delete($id)
    {
        error_log("Education :  Delete");
        $status = ProfileEducation::where('id', $id)->delete();
        return $status;
    }
    public function findOne($id)
    {
        error_log("Education :  FindOne");
        return ProfileEducation::find($id);
    }
    public function getAllEducation( $userID){
        return ProfileEducation::where('user_id', $userID)->get();
    }

}//class
