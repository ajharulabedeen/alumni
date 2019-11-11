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



    /**
     * Method is not complete! Have to add values.
     */
    public function create(Request $r)
    {
        $pAbout = new ProfileAbout();
        $pAbout->user_id = Utils::getUserId(); //error//refactor
        error_log( "Profile  : " . $pAbout->user_id);
        $about = $this->aboutRepo->findOneByUser($pBasic->user_id);

        if ($about != null) {
            error_log("about Exist!");
            $id = $about->id;
        } else {
           
            $pAbout->user_id       = $r->user_id;
            $pAbout->about_me      = $r->about_me;
          
            $id = $this->aboutRepo->save($pAbout);
        }

        
        return $id;
    }

}

?>