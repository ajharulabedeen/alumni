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
        // $pBasic->user_id = Utils::getUserId();//error
        $pBasic->user_id = $data->user_id;
        $pBasic->dept = $data->dept;
        $pBasic->batch = $data->batch;
        // $pBasic->student_id = $pBasic->batch . $this->getID();
        // $pBasic->first_Name = $this->getFName();
        // $pBasic->last_Name = $this->getLName();
        // $pBasic->birth_date = rand(1, 30) ."-". rand(1, 12) ."-". rand(1990, 2000);
        // $pBasic->gender = $this->getGender();
        // $pBasic->blood_group = $this->getBlood();
        // $pBasic->email = $pBasic->first_Name . "@gub.com";
        // $pBasic->phone = $this->getPhoneNumber();
        // $pBasic->religion = $this->getReligion();
        // $pBasic->research_interest = "IoT";
        // $pBasic->skills = "PHP";


        // return "Basic Creation!";
        // return $pBasic->dept;

        return $this->basicRepo->save($pBasic);
    }

    public function edit()
    {
        return " Edit Post : ";
    }

    public function delete()
    {
        return " Delete Post : ";
    }
}//class
