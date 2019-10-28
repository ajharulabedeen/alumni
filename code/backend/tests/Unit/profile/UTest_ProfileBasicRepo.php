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
        // $id = $this->save();
        // $this->findOne($id);

        // $this->delete();
        // $this->findOne(3);
        // $this->getCurrentLoggedUserID();
        $this->update();
        // $this->objectConvertion();

    } //main test

    //working
    public function objectConvertion(){
        $pBasic1 = new ProfileBasic();
        $pBasic1->user_id = Utils::getUserId();;
        $pBasic1->first_Name = "Khan";
        $pBasic1->last_Name = "Ajhar";
        $pBasic1->dept = "CSE";

        $pBasic2 = new ProfileBasic();
        $pBasic2->user_id = Utils::getUserId();;
        $pBasic2->first_Name = "K";
        $pBasic2->last_Name = "Ar";
        $pBasic2->dept = "CPS";

        error_log($pBasic1);
        error_log($pBasic2);
        if($pBasic1==$pBasic2){
            error_log("Object Are not Same!");
        }

        $pBasic1=$pBasic2;
        error_log("-----------------");
        if($pBasic1==$pBasic2){
            error_log("Same Values!");
        }
        error_log($pBasic1);
        error_log($pBasic2);

    }



    //passed.
    public function save()
    {

        // dept,
        // batch,
        // student_id,
        // first_name,
        // last_name,
        // birth_date,
        // gender,
        // blood_group,
        // email,
        // phone,
        // research_interest,
        // skills

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
        // error_log($oneProfileBasic);
        return $oneProfileBasic;
    }
    public function update(){
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $pBasic = new ProfileBasic();
        $pBasic = $this->findOne(5);
        error_log($pBasic->skills);
        $pBasic->skills = "Angular, PHP (Laravel)!++++";
        // $pBasic->id = 10;
        $status = $repoProfileBasic->update($pBasic);
        $this->assertEquals(true, $status);
        error_log($this->findOne(5)->skills);
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
