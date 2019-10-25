<?php

namespace App\profile;

use App\profile\ProfileBasic_Repo_I;

class ProfileBasic_Repo_Impl implements ProfileBasic_Repo_I
{
    public function save(ProfileBasic $profileBasic)
    {
        error_log("Profile Basic : Save");
        $profileBasic->save();
        return $profileBasic->id;
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
    public function findOne($id)
    {
        error_log("Profile Basic : FindOne");
    }
}//class
