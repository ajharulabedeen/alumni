<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\profile\ProfileBasic;
use App\profile\Profile_Basic_Repo_I;
use App\profile\Profile_Basic_Repo_Impl;
use App\Utils\Utils;

class Profile_Basic_Controller extends Controller
{

    protected $basicRepo;

    public function __construct(Profile_Basic_Repo_I $basicRepo)
    {
        error_log("Constructor : Profile_Basic_Controller");
        // $this->middleware('auth:api');
        $this->basicRepo = $basicRepo;
    }

    /**
     * Method is not complete! Have to add values.
     */
    public function create(Request $r)
    {
        $pBasic = new ProfileBasic();
        $pBasic->user_id = Utils::getUserId(); //error//refactor
        error_log("Profile  : " . $pBasic->user_id);
        $basic = $this->basicRepo->findOneByUser($pBasic->user_id);

        if ($basic != null) {
            error_log("Basic Exist!");
            $id = $basic->id;
        } else {
            // $pBasic->user_id    = $r->user_id;
            $pBasic->dept       = $r->dept;
            $pBasic->batch      = $r->batch;
            $pBasic->student_id = $r->student_id;
            $pBasic->passing_year = $r->passing_year;
            $pBasic->first_Name = $r->first_name;
            $pBasic->last_Name  = $r->last_name;
            $pBasic->gender     = $r->gender;
            $pBasic->birth_date = $r->birth_date;
            $pBasic->blood_group = $r->blood_group;
            $pBasic->email      = $r->email;
            $pBasic->phone      = $r->phone;
            $pBasic->address_present    = $r->address_present;
            $pBasic->address_permanent  = $r->address_permanent;
            $pBasic->religion           = $r->religion;
            $pBasic->research_interest  = $r->research_interest;
            $pBasic->skills             = $r->skills;
            $pBasic->social_media_link  = $r->social_media_link;

            $id = $this->basicRepo->save($pBasic);
        } //else

        // return $this->basicRepo->save($pBasic);
        return $id;
    }

    public function findOneByUserID(Request $r)
    {
        //user have to logged in.
        $user_id = Utils::getUserId();
        return response($this->basicRepo->findOneByUser($user_id));
    }

    //refactor : from font end have to send all the data else not given data will be saved as.
    public function update(Request $r)
    {
        $basicUpdate = new ProfileBasic();
        $user_id = Utils::getUserId();
        $basicUpdate = $this->basicRepo->findOneByUser($user_id);
        // $basicUpdate->id         = $data->id;
        // $basicUpdate->user_id    = $data->user_id;
        // error_log(" r->dept : " . $r->dept);
        // error_log(" exiting->dept : " . $basicUpdate->dept);
        $basicUpdate->dept       = $r->dept;
        $basicUpdate->batch      = $r->batch;
        $basicUpdate->student_id = $r->student_id;
        $basicUpdate->first_Name = $r->first_name;
        $basicUpdate->last_Name  = $r->last_name;
        $basicUpdate->birth_date = $r->birth_date;
        $basicUpdate->gender     = $r->gender;
        $basicUpdate->blood_group = $r->blood_group;
        $basicUpdate->email      = $r->email;
        $basicUpdate->phone      = $r->phone;
        $basicUpdate->religion   = $r->religion;
        $basicUpdate->research_interest = $r->research_interest;
        $basicUpdate->skills     = $r->skills;

        return $this->basicRepo->update($basicUpdate);
    }

    /**
     * think it will not be much used.
     * cause deleting a profile will only delete the entire basic.
     * people in the most cases will be allowed,
     */
    public function delete()
    {
        return " Delete Post : ";
    }
}//class
