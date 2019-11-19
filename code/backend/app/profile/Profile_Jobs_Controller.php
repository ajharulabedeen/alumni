<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile\Profile_Education_Repo_I;
use App\profile\Profile_Jobs_Repo_I;
use App\profile\ProfileEducation;
use App\profile\ProfileJobs;
use App\Utils\Utils;

class Profile_Jobs_Controller extends Controller
{
    protected $jobsRepo;

    public function __construct(Profile_Jobs_Repo_I $jobsRepo)
    {
        $this->jobsRepo = $jobsRepo;
    }

    /**
     * conpleted. afterinsertion id will be backed.
     */
    public function create(Request $r)
    {
        $job = new ProfileJobs();
        $job->user_id     = Utils::getUserId();
        $job->organization_name = $r->organization_name;
        $job->type = $r->type;
        $job->role = $r->role;
        $job->started = $r->started;
        $job->leave = $r->leave;
        $job->current_status = $r->current_status;
        $id = $this->jobsRepo->save($job);
        return $id;
    } //m


    /**
     * @uses Risk Security.
     *
     */
    public function update(Request $r)
    {
        $job = new ProfileJobs();
        // $job->user_id     = Utils::getUserId();
        $job = $this->jobsRepo->findOne($r->id);
        $job->organization_name = $r->organization_name;
        $job->type = $r->type;
        $job->role = $r->role;
        $job->started = $r->started;
        $job->leave = $r->leave;
        $job->current_status = $r->current_status;
        return ['status' => $this->jobsRepo->update($job)];
    }

    public function getAllJobsByUserId()
    {
        return $this->jobsRepo->getAllJobs(Utils::getUserId());
    }

    public function deleteOne(Request $r)
    {
        return ['status' => $this->jobsRepo->delete($r->id)];
    }
}//class
