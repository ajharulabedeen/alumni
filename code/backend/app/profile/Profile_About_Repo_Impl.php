<?php

namespace App\profile;

use App\profile\ProfileAbout;
use League\Flysystem\Exception;

class Profile_About_Repo_Impl implements Profile_About_Repo_I
{
    public function save(ProfileAbout $profileAbout)
    {
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
    public function update(ProfileAbout $profileAboutUpdate)
    {
        error_log("About : Update");
        $raedOld = false;
        $updateStatus = false;
        try {
            $about_id = $profileAboutUpdate->id;
            $aboutOrgin = ProfileAbout::find($about_id);
            $raedOld = true;
        } catch (Exception $e) {
            error_log("Post Update : failed to read existig post.");
        }
        if ($raedOld) {
            try {
                $this->setPostValues($aboutOrgin, $profileAboutUpdate)->update();
                $updateStatus = true;
            } catch (Exception $e) {
                error_log("Profile About Update : Failed to save updated Profile Update." . "\n\n" . $e);
            }
        }
        return  $updateStatus;
    }
    public function delete($id)
    {
        error_log("About : delete");
        $status = ProfileAbout::where('id', $id)->delete();
        return $status;
    }
    public function findOne($id)
    {
        error_log("About : findOne");
        $data = ProfileAbout::find($id);
        return $data;
    }

    public function findAboutByUser($userID)
    {
        error_log(" findAboutByUser : ");
        $data = ProfileAbout::where('user_id', $userID)->first();
        return $data;
    }


    private function setPostValues(ProfileAbout $aboutOrgin,  ProfileAbout $profileAboutUpdate)
    {
        try {
            if ($profileAboutUpdate->id != null) {
                $aboutOrgin->id = $profileAboutUpdate->id;
            }
            if ($profileAboutUpdate->about_me != null) {
                $aboutOrgin->about_me = $profileAboutUpdate->about_me;
            }
        } catch (Exception $e) {
            error_log("Problem is Data Setting in Profile About! ");
        }

        return $aboutOrgin;
    }
}//class
