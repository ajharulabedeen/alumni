<?php

namespace Tests\Unit\profile;

use App\profile\ProfileBasic;
use Tests\TestCase;
use App\profile\ProfileBasic_Repo_Impl;

class UTest_ProfileBasicRepo extends TestCase
{

    /**
     * Mother test
     * This method will w$ork as mother test method.
     * all other test method will be called from here.
     * So test skip can be easily achived.
     *
     */
    public function testMain()
    {
        echo "\n >----------- Test Main : ---------> \n";
        // $this->save();
        $this->delete();
    } //main test


    //passed.
    public function save()
    {
        // $repoProfileBasic = $this->getRepo();
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $pBasic = new ProfileBasic();
        $pBasic->first_Name = "Khan";
        $pBasic->last_Name = "Ajhar";
        $pBasic->dept = "CSE";
        $id = $repoProfileBasic->save($pBasic);
        error_log("User ID after Save  : " . $id);
    }

    //passed.
    public function delete()
    {
        // $repoProfileBasic = $this->getRepo();
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $id = $repoProfileBasic->delete(3);
        error_log("User ID after Save  : " . $id);
    }

    public function getRepo(){
        new ProfileBasic_Repo_Impl();
    }
}//class
