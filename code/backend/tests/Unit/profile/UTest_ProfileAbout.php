<?php

namespace Tests\Unit\profile;

use App\profile\ProfileBasic;
use Tests\TestCase;
use App\profile\Profile_About_Repo_Impl;
use App\profile\ProfileAbout;
use App\Utils\Utils;

$repoProfileAbout =  new Profile_About_Repo_Impl();

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
        $this->update();
        // $this->delete(2);
        // $this->findOne(2);
        // $this->getCurrentLoggedUserID();
    } //main test

    //passed
    public function update(){
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $proAbout = new ProfileAbout();
        $proAbout = $this->findOne(4);
        $proAbout->about_me = "About Me Changed! Dim Dim";
        $updateStatus = $repoProfileAbout->update($proAbout);
        $this->assertEquals(true, $updateStatus);
        $proAbout = $this->findOne(4);
    }

    //passed.
    public function save()
    {
        // $repoProfileAbout = $this->getRepo();
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $proAbout = new ProfileAbout();
        $proAbout->user_id = Utils::getUserId();;
        $proAbout->about_me = "This is test about!";
        $id = $repoProfileAbout->save($proAbout);
        error_log("User ID after Save  : " . $id);
        $this->assertNotEmpty($id);
        $this->findOne($id);
    }

    public function delete($id)
    {
        // $repoProfileAbout = $this->getRepo();
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $deleteStatus = $repoProfileAbout->delete($id);
        error_log("Status after Delete  : " . $deleteStatus);
        $this->assertEquals( $deleteStatus, 1);
    }

    //passed
    public function findOne($id){
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $oneProfileAbout = $repoProfileAbout->findOne($id);
        error_log($oneProfileAbout);
        $this->assertEquals($id, $oneProfileAbout->id);
        // $this->delete($id);
        return $oneProfileAbout;
    }

    //passed
    public function getCurrentLoggedUserID(){
        $id = Utils::getUserId();
        error_log($id);
    }

    public function getRepo(){
        new Profile_About_Repo_Impl();
    }
}//class
