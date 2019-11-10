<?php

namespace App\profile;

use App\profile\Profile_Basic_Repo_I;

class Profile_Basic_Repo_Impl implements Profile_Basic_Repo_I
{
    public function save(ProfileBasic $profileBasic)
    {
        $id = -1;
        try {
            $profileBasic->save();
            $id = $profileBasic->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Post Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }
    public function update(ProfileBasic $basicUpdate)
    {
        error_log("Profile Basic : Update");
        $updateStatus = false;
        try {
            $basic_id = $basicUpdate->id;
            $basicOrgin = ProfileBasic::find($basic_id);
            $basicOrgin = $basicUpdate;
            $basicOrgin->update();
            $updateStatus = true;
        } catch (Exception $e) {
            error_log("Profile Basic Update : failed to read existig profile.");
            return  $updateStatus;
        }
        return (string) $updateStatus;
    }
    public function delete($id)
    {
        error_log("Profile Basic : Delete");
        $status = ProfileBasic::where('id', $id)->delete();
        return (string) $status;
    }
    //passed
    public function findOne($id)
    {
        error_log("Profile Basic : FindOne");
        $data = ProfileBasic::find($id);
        return $data;
    }
    public function findOneByUser($userId)
    {
        error_log("Profile Basic : FindOneByUser");
        $data = ProfileBasic::where('user_id', $userId)->first();
        return $data;
    }

    public function basicExist($userId){

    }

    // private area : -------------------
    private function setPostValues($basicOrgin, $basicUpdate)
    {
        if ($basicUpdate->id != null) {
            // $basicOrgin-> = $basicUpdate
        }
    }
}//class
