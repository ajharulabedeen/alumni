<?php

namespace App\Http\Controllers;

use App\administration\Administration;
use App\administration\Administration_Repo_I;
use Illuminate\Http\Request;

class Administrator_Controller extends Controller
{
    protected $administrationRepo;

    public function __construct(Administration_Repo_I $administrationRepo)
    {
        error_log(__CLASS__);
        error_log("Administrator_Controller");
        // $this->middleware('auth:api');
        $this->administrationRepo = $administrationRepo;
    }

    public function save(Request $r)
    {
        $ad = new Administration();
        $ad->title = $r->title;
        $ad->description = $r->description;
        $id = $this->administrationRepo->save($ad);
        return $id;
    }

}//class
