<?php

namespace App\profile;

use App\profile\ProfileBasic_Repo_I;

class ProfileBasic_Repo_Impl implements ProfileBasic_Repo_I
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
        error_log("Profile Basic : Edit");
        $raedOld = false;
        $updateStatus = false;
        try {
            $basic_id = $basicUpdate->id;
            error_log("---" . $basic_id);
            $basicOrgin = ProfileBasic::find($basic_id);
            $raedOld = true;
        } catch (Exception $e) {
            error_log("Profile Basic Update : failed to read existig profile.");
            return  $updateStatus;
        }
        if ($raedOld) {
            try {
                $basicOrgin = $basicUpdate;
                $basicOrgin->update();
                $updateStatus = true;
            } catch (Exception $e) {
                error_log("Profile Basic Update : Failed to save updated Profile Update." . "\n\n" . $e);
            }
        }
        return  $updateStatus;
    }
    public function delete($id)
    {
        error_log("Profile Basic : Delete");
        $status = ProfileBasic::where('id', $id)->delete();
        return $status;
    }
    //passed
    public function findOne($id)
    {
        error_log("Profile Basic : FindOne");
        $data = ProfileBasic::find($id);
        return $data;
    }

    private function setPostValues($basicOrgin, $basicUpdate){
        if($basicUpdate->id != null){
            // $basicOrgin-> = $basicUpdate
        }
    }
}//class
