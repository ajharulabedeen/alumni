<?php

namespace App\profile;

use App\profile\ProfileJobs;

class Profile_Jobs_Repo_Impl implements Profile_Jobs_Repo_I
{
    public function save(ProfileJobs $jobs)
    {
        error_log("Job :  Save");
        $id = -1;
        try {
            $jobs->save();
            $id = $jobs->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Job Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }

    public function update(ProfileJobs $jobsUpdate)
    {
        error_log("Job :  Update");
        $updateStatus = false;
        try {
            $job_id = $jobsUpdate->id;
            $jobOrgin = ProfileJobs::find($job_id);
            $jobOrgin = $jobsUpdate;
            $jobOrgin->update();
            $updateStatus = true;
        } catch (Exception $e) {
            error_log("Profile Job Update : failed to read existig Job.");
            return  $updateStatus;
        }
        return  $updateStatus;
    }
    public function delete($id)
    {
        error_log("Job :  Delete");
        $status = ProfileJobs::where('id', $id)->delete();
        return $status;
    }
    public function findOne($id)
    {
        error_log("Job :  FindOne");
        return ProfileJobs::find($id);
    }

    public function getAllJobs( $userID){
        return ProfileJobs::where('user_id', $userID)->get();
    }

}//class
