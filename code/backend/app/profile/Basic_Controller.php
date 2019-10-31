<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Basic_Controller extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function create(Request $data)
    {
        $pBasic = new ProfileBasic();
        $pBasic->user_id = Utils::getUserId();;
        $pBasic->dept = $this->getDept();
        $pBasic->batch = $this->getBatchNumber();
        $pBasic->student_id = $pBasic->batch . $this->getID();
        $pBasic->first_Name = $this->getFName();
        $pBasic->last_Name = $this->getLName();
        $pBasic->birth_date = rand(1, 30) ."-". rand(1, 12) ."-". rand(1990, 2000);
        $pBasic->gender = $this->getGender();
        $pBasic->blood_group = $this->getBlood();
        $pBasic->email = $pBasic->first_Name . "@gub.com";
        $pBasic->phone = $this->getPhoneNumber();
        $pBasic->religion = $this->getReligion();
        $pBasic->research_interest = "IoT";
        $pBasic->skills = "PHP";
     }

    public function edit()
    {
        return " Edit Post : ";
    }
}//class
