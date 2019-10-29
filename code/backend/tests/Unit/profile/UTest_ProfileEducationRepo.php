<?php

namespace Tests\Unit\profile;


use Tests\TestCase;
use App\profile\Profile_Education_Repo_Impl;
use App\profile\ProfileAbout;
use App\profile\ProfileEducation;
use App\Utils\Utils;



class UTest_ProfileEducationRepo extends TestCase
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
        // error_log($this->save());
        // $this->update();
        // $this->delete(2);
        // $this->findOne(2);
        // $this->getCurrentLoggedUserID();
        $this->insertingManyEducation();
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


    //passed
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
        $repoProfileAbout =  new Profile_Education_Repo_Impl();
        $education = new ProfileEducation();
        $education->user_id = Utils::getUserId();
        $education->user_id = rand(1, 10000);
        $education->degree_name = $this->getDegreeName();
        $education->institue_name = $this->getInstituteName();
        $education->passing_year = rand(1990, 2000);
        $r = (rand(2, 5));
        $education->result = $r + (rand(0, 9) / 10);

        $id = $repoProfileAbout->save($education);
        // error_log($id);
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
    // ----------------------------------------
    public function insertingManyEducation()
    {
        for ($i = 0; $i < 10000; $i++) {
            $repoProfileAbout =  new Profile_Education_Repo_Impl();
            $education = new ProfileEducation();
            $education->user_id = Utils::getUserId();
            $education->user_id = rand(1, 10000);
            $education->degree_name = $this->getDegreeName();
            $education->institue_name = $this->getInstituteName();
            $education->passing_year = rand(1990, 2000);
            $r = (rand(2, 5));
            $education->result = $r + (rand(0, 9) / 10);

            $id = $repoProfileAbout->save($education);
            error_log($id);
        }
    }
    public function getDegreeName()
    {
        $degreeName = array("Bsc", "Msc", "Phd", "SSC", "HSC", "MS", "Mphil", "JSC");
        $index = rand(0, count($degreeName) - 1);
        return $degreeName[$index];
    }
    public function getInstituteName()
    {
        $instituteName = array(
            "Green University of Bangladesh",
            "University of Dhaka",
            "University of Rajshahi",
            "Islamic University, Bangladesh",
            "Khulna University of Engineering & Technology",
            "Wuhan University",
            "Mirpur Institue of Technology",
            "Oxford University",
            "Shapaur School",
            "BL Collage",
            "S M Collage",
            "MM Collage",
            "Dhaka Collage",
            "Tutumr Collage",
            "Dumuria Collage",
            "M R High School",
            "Dumuria School",
            "Kustia Zilla School",
            "Dhaka Zilla School",
            "Barishal Zilla School",
            "Cumilla Zilla School",
        );
        $index = rand(0, count($instituteName) - 1);
        return $instituteName[$index];
    }
}//class
