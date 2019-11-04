<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile\ProfileBasic;
use App\profile\ProfileBasic_Repo_I;
use App\profile\ProfileBasic_Repo_Impl;
use App\Utils\Utils;

class Basic_Controller extends Controller
{

    protected $basicRepo;

    public function __construct(ProfileBasic_Repo_I $basicRepo)
    {
        // $this->middleware('auth:api');
        $this->basicRepo = $basicRepo;
    }

    /**
     * Method is not complete! Have to add values.
     */
    public function create(Request $data)
    {
        $pBasic = new ProfileBasic();
        // $pBasic->user_id = Utils::getUserId();//error//refactor
        $pBasic->user_id    = $data->user_id;
        $pBasic->dept       = $data->dept;
        $pBasic->batch      = $data->batch;
        $pBasic->student_id = $data->student_id;
        $pBasic->first_Name = $data->first_name;
        $pBasic->last_Name  = $data->last_name;
        $pBasic->birth_date = $data->birth_date;
        $pBasic->gender     = $data->gender;
        $pBasic->blood_group = $data->blood_group;
        $pBasic->email      = $data->email;
        $pBasic->phone      = $data->phone;
        $pBasic->religion   = $data->religion;
        $pBasic->research_interest = $data->research_interest;
        $pBasic->skills     = $data->skills;

        return $this->basicRepo->save($pBasic);
    }

    public function findOneByUserID(Request $data)
    {
        return $this->basicRepo->save($data->user_id);
    }

    public function update(Request $data)
    {
        $basicUpdate = new ProfileBasic();
        // $basicUpdate->user_id = Utils::getUserId();//error//refactor
        $basicUpdate->id    = $data->id;
        $basicUpdate->user_id    = $data->user_id;
        $basicUpdate->dept       = $data->dept;
        $basicUpdate->batch      = $data->batch;
        $basicUpdate->student_id = $data->student_id;
        $basicUpdate->first_Name = $data->first_name;
        $basicUpdate->last_Name  = $data->last_name;
        $basicUpdate->birth_date = $data->birth_date;
        $basicUpdate->gender     = $data->gender;
        $basicUpdate->blood_group = $data->blood_group;
        $basicUpdate->email      = $data->email;
        $basicUpdate->phone      = $data->phone;
        $basicUpdate->religion   = $data->religion;
        $basicUpdate->research_interest = $data->research_interest;
        $basicUpdate->skills     = $data->skills;

        return $this->basicRepo->update($basicUpdate);
    }

    public function delete()
    {
        return " Delete Post : ";
    }
}//class
