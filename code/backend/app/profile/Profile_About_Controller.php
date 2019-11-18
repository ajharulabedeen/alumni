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
     * Method is not complete! Have to add values.
     */
    public function create(Request $r)
    {
        $pAbout = new ProfileAbout();
        $pAbout->user_id = Utils::getUserId();
        error_log( "Profile  : " . $pAbout->user_id);
        // $about = $this->aboutRepo->findOneByUser($pBasic->user_id);
        // $about = $this->aboutRepo->fin;

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
