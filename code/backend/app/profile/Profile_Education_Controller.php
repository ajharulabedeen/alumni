<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile\Profile_Education_Repo_I;
use App\profile\ProfileEducation;
use App\Utils\Utils;

class Profile_Education_Controller extends Controller
{
    protected $educationRepo;

    public function __construct(Profile_Education_Repo_I $educationRepo)
    {
        $this->educationRepo = $educationRepo;
    }

    /**
     * conpleted. afterinsertion id will be backed.
     */
    public function create(Request $r)
    {
        $education = new ProfileEducation();
        $education->user_id     = Utils::getUserId();
        $education->degree_name = $r->degree_name;
        $education->institue_name = $r->institue_name;
        $education->passing_year  = $r->passing_year;
        $education->result = $r->result;
        $id = $this->educationRepo->save($education);
        return $id;
    } //m


    /**
     * @uses Risk Security.
     *
     */
    public function update(Request $r)
    {
        $education = new ProfileEducation();
        // $education->user_id = Utils::getUserId();
        $education = $this->educationRepo->findOne($r->id);
        $education->degree_name = $r->degree_name;
        $education->institue_name = $r->institue_name;
        $education->passing_year = $r->passing_year;
        $education->result = $r->result;
        return ['status' => $this->educationRepo->update($education)];
    }

    public function getAllEducationsByUserId()
    {
        return $this->educationRepo->getAllEducation(Utils::getUserId());
    }

    public function deleteOne(Request $r)
    {
        error_log("Education Delete ID : " . $r->id);
        return ['status' => $this->educationRepo->delete($r->id)];
    }
}//class
