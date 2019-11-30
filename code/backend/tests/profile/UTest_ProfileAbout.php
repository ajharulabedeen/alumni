<?php

namespace Tests\Unit\profile;


use Tests\TestCase;
use App\profile\Profile_About_Repo_Impl;
use App\profile\ProfileAbout;
use App\Utils\Utils;



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
        error_log("About ID : " . $this->save());
        // $this->update();
        // $this->delete(2);
        // $this->findOne(2);
        // $this->getCurrentLoggedUserID();
        // $this->findAboutByUserID(23);
    } //main test


    public function AboutCRUD()
    {
        $id = $this->save();
        $about = $this->findOne($id);
        $this->assertEquals($id, $about->id);
        error_log($about);

        $text = "About Me Changed! Dim Dim";
        $updatedText = $this->update($id, $text);
        $this->assertEquals($text, $updatedText);
        error_log($this->findOne($id));

        $status = $this->delete($id);
        $this->assertEquals(1, $status);

        error_log("\nAbout CRUD Test Done!\n");
    }
    public function findAboutByUserID($uesrID)
    {
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $oneProfileAboutByUserID = $repoProfileAbout->findAboutByUser($uesrID);
        error_log($oneProfileAboutByUserID);
        return $oneProfileAboutByUserID;
    }

    public function update($id, $text)
    {
        error_log("--Update Test : ");
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $proAbout = new ProfileAbout();
        $proAbout = $this->findOne($id);
        $proAbout->about_me = $text;
        $updateStatus = $repoProfileAbout->update($proAbout);
        $this->assertEquals(true, $updateStatus);
        return $this->findOne($id)->about_me;
    }

    //passed.
    public function save()
    {
        error_log("--Save Test: ");
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $proAbout = new ProfileAbout();
        // $proAbout->user_id = Utils::getUserId();;
        $proAbout->user_id = "4";
        $proAbout->about_me = "Sajib : This is test about!";
        $id = $repoProfileAbout->save($proAbout);
        return $id;
    }

    public function delete($id)
    {
        error_log("--Delete  Test: ");
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $deleteStatus = $repoProfileAbout->delete($id);
        return $deleteStatus;
    }

    //passed
    public function findOne($id)
    {
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $oneProfileAbout = $repoProfileAbout->findOne($id);
        return $oneProfileAbout;
    }

    //passed
    public function getCurrentLoggedUserID()
    {
        $id = Utils::getUserId();
        error_log($id);
    }

    public function getRepo()
    {
        new Profile_About_Repo_Impl();
    }
}//class
