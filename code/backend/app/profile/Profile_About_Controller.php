<?php
namespace App\Http\Controllers;

class Profile_About_Controller extends Controller
{
protected $aboutRepo;

    public function __construct(ProfileAbout_Repo_I $aboutRepo)
    {
        // $this->middleware('auth:api');
        $this->aboutRepo = $aboutRepo;
    }

}

?>