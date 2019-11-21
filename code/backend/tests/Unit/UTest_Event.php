<?php

namespace Tests\Unit\profile;

use Tests\TestCase;
use App\Utils\Utils;
use App\events\Events_Repo_Impl;
use App\events\Events;

class UTest_Event extends TestCase
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
        error_log($this->save());
        // $this->update();
        // $this->delete(2);
        // $this->findOne(2);
        // $this->getCurrentLoggedUserID();
        // $this->findAboutByUserID(2);
    } //main test

    //not done
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

    public function save()
    {
        error_log("-- Save Test Event : ---");
        $repoEvent =  new Events_Repo_Impl();
        $event = new Events();
        $event->user_id = "8";
        $event->title = "This is Admission!";
        $event->start_date = "10-10-2019";
        $event->end_date = "12-10-2019";
        $event->fee = "200";
        $event->location = "University Auditerum.";
        $event->description = "Admission offer for CSE student!";
        $event->notes = "25% Off";

        $id = $repoEvent->create($event);
        return $id;
    }

    public function delete($id)
    {
        error_log("--Delete  Test: ");
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $deleteStatus = $repoProfileAbout->delete($id);
        return $deleteStatus;
    }

    public function findOne($id)
    {
        $repoProfileAbout =  new Profile_About_Repo_Impl();
        $oneProfileAbout = $repoProfileAbout->findOne($id);
        return $oneProfileAbout;
    }

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
