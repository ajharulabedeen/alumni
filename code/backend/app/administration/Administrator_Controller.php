<?php

namespace App\Http\Controllers;

use App\administration\Administration;
use App\administration\Administration_Repo_I;
use App\administration\AdministrationPeople;
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

    public function delete(Request $r)
    {
        return $this->administrationRepo->delete($r->id);
    }

    public function save(Request $r)
    {
        $ad = new Administration();
        $ad->title = $r->title;
        $ad->description = $r->description;
        $id = $this->administrationRepo->save($ad);
        return $id;
    }

    public function assign_people(Request $r)
    {
        $adPeople = new AdministrationPeople();
        $adPeople->user_id = $r->user_id;
        $adPeople->role_id = $r->role_id;
        $data = $this->administrationRepo->assign_people($adPeople);
        return $data;
    }

    public function remove_people(Request $r)
    {
        $data = $this->administrationRepo->remove_people($r->id);
        return $data;
    }

    public function get_assigned_people(Request $r)
    {
        $data = $this->administrationRepo->get_all_assingned_people($r->role_id);
        return $data;
    }


}//class
