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
    public function edit(ProfileBasic $profileBasicUpdate)
    {
        error_log("Profile Basic : Edit");
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
}//class
