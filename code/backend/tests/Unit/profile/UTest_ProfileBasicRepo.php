<?php

namespace Tests\Unit\profile;

use App\profile\ProfileBasic;
use Tests\TestCase;
use App\profile\ProfileBasic_Repo_Impl;
use App\Utils\Utils;

$repoProfileBasic =  new ProfileBasic_Repo_Impl();

$id=null;

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
        $id = $this->save();
        $this->findOne($id);

        // $this->delete();
        $this->findOne(3);
        // $this->getCurrentLoggedUserID();
    } //main test





    //passed.
    public function save()
    {
        // $repoProfileBasic = $this->getRepo();
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $pBasic = new ProfileBasic();
        $pBasic->user_id = Utils::getUserId();;
        $pBasic->first_Name = "Khan";
        $pBasic->last_Name = "Ajhar";
        $pBasic->dept = "CSE";
        $id = $repoProfileBasic->save($pBasic);
        error_log("User ID after Save  : " . $id);
        $this->findOne($id);
        return $id;
    }

    //passed.
    public function delete($id)
    {
        // $repoProfileBasic = $this->getRepo();
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $status = $repoProfileBasic->delete($id);
        error_log("User ID after Save  : " . $status);
        return $status;
    }

    //passed
    public function findOne($id){
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $oneProfileBasic = $repoProfileBasic->findOne($id);
        error_log($oneProfileBasic);
    }

    //passed
    public function getCurrentLoggedUserID(){
        $id = Utils::getUserId();
        error_log($id);
    }

    public function getRepo(){
        new ProfileBasic_Repo_Impl();
    }
}//class
