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
        $this->administrationRepo = $administrationRepo;
    }

    public function update(Request $r)
    {
        $ad = new Administration();
        $ad->id = $r->id;
        $ad->title = $r->title;
        $ad->description = $r->description;
        $id = $this->administrationRepo->update($ad);
        return $id;
    }

    public function getAll(Request $r)
    {
        return $this->administrationRepo->getAll();
    }

    public function findOne(Request $r)
    {
        return $this->administrationRepo->findOne($r->id);
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
