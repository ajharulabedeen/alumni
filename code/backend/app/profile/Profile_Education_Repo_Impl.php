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
    }
    public function delete($id)
    {
        error_log("Education :  Delete");
    }
    public function findOne($id)
    {
        error_log("Education :  FindOne");
    }
}//class
