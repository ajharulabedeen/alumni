<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile\Profile_About_Repo_I;
use App\profile\ProfileAbout;
use App\Utils\Utils;

class Profile_About_Controller extends Controller
{
    protected $aboutRepo;

    public function __construct(Profile_About_Repo_I $aboutRepo)
    {
        // $this->middleware('auth:api');
        $this->aboutRepo = $aboutRepo;
    }
    /**
     * conpleted. afterinsertion id will be backed.
     */
    public function create(Request $r)
    {
        $pAbout = new ProfileAbout();
        $pAbout->user_id = Utils::getUserId();
        $about = $this->aboutRepo->findAboutByUser($pAbout->user_id);
        // $about = null;
        if ($about != null) {
            error_log("about Exist!");   
            $id = $about->id;
        } else {
            $pAbout->about_me      = $r->about_me;
            $id = $this->aboutRepo->save($pAbout);
        }
        return $id;
    } //m


    //refactor : from font end have to send all the data else not given data will be saved as.
    public function update(Request $r)
    {
        $aboutUpdate = new ProfileAbout();
        $user_id = Utils::getUserId();
        $aboutUpdate = $this->aboutRepo->findAboutByUser($user_id);
        $aboutUpdate->about_me      = $r->about_me;
        return ['status' => $this->aboutRepo->update($aboutUpdate)];
    }

    public function getAboutByUserId()
    {
        $user_id = Utils::getUserId();
        return $this->aboutRepo->findAboutByUser($user_id);
    }
}//class
