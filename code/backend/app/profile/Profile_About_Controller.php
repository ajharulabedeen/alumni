<?php
class Profile_about_Controller extends Controller
{
protected $aboutRepo;


    public function __construct(ProfileAbout_Repo_I $aboutRepo)
    {
        // $this->middleware('auth:api');
        $this->aboutRepo = $aboutRepo;
    }

}

?>