<?php

namespace Tests\Unit;

use App\administration\Administration_Repo_Impl;
use App\administration\Administration;
use App\administration\AdministrationPeople;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_Test_Administration extends TestCase
{
    public function testMain()
    {

//        error_log($this->create());//passed
//        error_log($this->findOne(1));//passed
//        error_log($this->delete(2));
//        error_log($this->update(3, "title", "Acc"));
//        error_log($this->getAll());
        error_log($this->assign_people("3", "22"));
//        error_log($this->remove_people("3")['status']);

    }

    public function remove_people(string $id)
    {
        $repo = new Administration_Repo_Impl();
        $id = $repo->remove_people($id);
        return $id;
    }

    public function assign_people(string $user_id, string $role_id)
    {
        $repo = new Administration_Repo_Impl();
        $adPeople = new AdministrationPeople();
        $adPeople->user_id = $user_id;
        $adPeople->role_id = $role_id;
        $id = $repo->assign_people($adPeople);
        return $id;
    }

    /**
     * A basic test example.
     * @return void
     */
    public function create()
    {
        $repo = new Administration_Repo_Impl();
        $ad = new Administration();
        $ad->title = "President";
        $ad->description = "Head of All activity, valid for 2 years!";
        $id = $repo->save($ad);
        return $id;
    }

    public function findOne($id)
    {
        $repo = new Administration_Repo_Impl();
        return $repo->findOne($id);
    }

    public function delete($id)
    {
        $repo = new Administration_Repo_Impl();
        return $repo->delete($id);
    }

    public function update($id, $filedName, $data)
    {
        $repo = new Administration_Repo_Impl();
        $ad = $this->findOne($id);
        $ad->$filedName = $data;
        $status = $repo->update($ad);
        return $status;
    }

    public function getAll()
    {
        $repo = new Administration_Repo_Impl();
        $data = $repo->getAll();
        foreach ($data as $k) {
            error_log($k);
        }
    }

}//class
