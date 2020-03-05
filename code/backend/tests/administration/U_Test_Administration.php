<?php

namespace Tests\Unit;

use App\administration\Administration_Repo_Impl;
use App\administration\Administration;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_Test_Administration extends TestCase
{
    public function testMain()
    {
//        $this->dummyDataInsert();//passed
//        $this->dummyEventRegistraion();//passed

//        error_log($this->create());//passed
//        error_log($this->findOne(1));//passed
        error_log($this->delete(2));
//        error_log($this->update(1, "fee", "600.00"));
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

}//class
