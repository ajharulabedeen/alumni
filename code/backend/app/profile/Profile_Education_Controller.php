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
        // $this->middleware('auth:api');
        $this->educationRepo = $educationRepo;
    }

    /**
     * conpleted. afterinsertion id will be backed.
     */
    public function create(Request $r)
    {
        $education = new ProfileEducation();
        $education->user_id = Utils::getUserId();
        $education->degree_name = $r->degree_name;
        $education->institue_name = $r->institue_name;
        $education->passing_year = $r->passing_year;
        $education->result = $r->result;
        $id = $this->educationRepo->save($education);
        return $id;
    } //m


    //refactor : from font end have to send all the data else not given data will be saved as.
    public function update(Request $r)
    {
        // $aboutUpdate = new ProfileAbout();
        // $user_id = Utils::getUserId();
        // $aboutUpdate = $this->aboutRepo->findAboutByUser($user_id);
        // $aboutUpdate->about_me      = $r->about_me;
        // return ['status' => $this->aboutRepo->update($aboutUpdate)];
    }

    public function getAllEducationsByUserId()
    {
        return $this->educationRepo->getAllEducation(Utils::getUserId());
    }

    public function deleteOne(Request $r)
    {
        return ['status'=>$this->educationRepo->delete($r->id)];
    }

}//class
