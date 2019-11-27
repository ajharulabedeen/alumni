<?php

namespace Tests\Unit\profile;


use Tests\TestCase;
use App\profile\Profile_Education_Repo_Impl;
use App\profile\Profile_Jobs_Repo_Impl;
use App\profile\ProfileAbout;
use App\profile\ProfileEducation;
use App\profile\ProfileJobs;
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
        // error_log($this->save());//
        // $this->update(1, "ECE");//
        // $this->delete(1);//
        // error_log($this->findOne(2));
        // $this->getCurrentLoggedUserID();
        // $this->getAllEducation(1000);

        $this->insertingManyJobs();
    } //main test


    public function EducationCRUD()
    {
        $id = $this->save();
        $education = $this->findOne($id);
        $this->assertEquals($id, $education->id);
        error_log($education);

        $text = "ME";
        $updatedText = $this->update($id, $text);
        $this->assertEquals($text, $updatedText);
        error_log($this->findOne($id));

        $status = $this->delete($id);
        $this->assertEquals(1, $status);

        error_log("\nEducation CRUD Test Done!\n");
    }

    //passed. of certain ID.
    public function getAllEducation($userID)
    {
        $educationRepo =  new Profile_Education_Repo_Impl();
        $oneEducation = $educationRepo->getAllEducation($userID);
        error_log($oneEducation);
    }

    //passed
    public function update($id, $text)
    {
        error_log("--Update Test : ");
        $repoRepo =  new Profile_Jobs_Repo_Impl();
        $jobs = new ProfileJobs();
        $jobs = $this->findOne($id);
        // error_log($jobs);
        $jobs->type = $text;
        $updateStatus = $repoRepo->update($jobs);
        $this->assertEquals(true, $updateStatus);
        // error_log($this->findOne($id));
        return $this->findOne($id)->type;
    }

    //passed.
    public function save()
    {
        error_log("--Save Test: ");
        $repoProfileJob =  new Profile_Jobs_Repo_Impl();
        $jobs = new ProfileJobs();
        $jobs->user_id = rand(1, 10000);
        $jobs->organization_name = $this->getInstituteName();
        $jobs->type = $this->getType();
        $jobs->role = $this->getRole();
        $jobs->started = rand(1, 30) . "-" . rand(1, 12) . "-" . rand(1990, 2000);
        $jobs->leave = rand(1, 30) . "-" . rand(1, 12) . "-" . rand(1990, 2000);
        $jobs->current_status = $this->getCurrentStatus();
        $id = $repoProfileJob->save($jobs);
        // error_log($id);
        return $id;
    }

    public function delete($id)
    {
        error_log("--Delete  Test: ");
        $jobsRepo =  new Profile_Jobs_Repo_Impl();
        $deleteStatus = $jobsRepo->delete($id);
        return $deleteStatus;
    }

    public function findOne($id)
    {
        $educationRepo =  new Profile_Jobs_Repo_Impl();
        $oneEducation = $educationRepo->findOne($id);
        return $oneEducation;
    }

    //passed
    public function getCurrentLoggedUserID()
    {
        $id = Utils::getUserId();
        error_log($id);
    }
    // ----------------------------------------
    public function insertingManyJobs()
    {
        $repoProfileJob =  new Profile_Jobs_Repo_Impl();
        for ($i = 0; $i < 10000; $i++) {
            $jobs = new ProfileJobs();
            $jobs->user_id = rand(1, 10000);
            $jobs->organization_name = $this->getInstituteName();
            $jobs->type = $this->getType();
            $jobs->role = $this->getRole();
            $jobs->started = rand(1, 30) . "-" . rand(1, 12) . "-" . rand(1990, 2000);
            $jobs->leave = rand(1, 30) . "-" . rand(1, 12) . "-" . rand(1990, 2000);
            $jobs->current_status = $this->getCurrentStatus();
            $id = $repoProfileJob->save($jobs);
            error_log($id);
        }
    }
    public function getCurrentStatus()
    {
        $status = array("Working", "Leave", "Resinged", "Traning");
        $index = rand(0, count($status) - 1);
        return $status[$index];
    }
    public function getType()
    {
        $degreeName = array("Public", "Private", "Owner", "PP");
        $index = rand(0, count($degreeName) - 1);
        return $degreeName[$index];
    }
    public function getRole()
    {
        $role = array("CEO", "CTO", "Software Engineer", "LMMS", "Programmer", "MD", "Owener");
        $index = rand(0, count($role) - 1);
        return $role[$index];
    }
    public function getInstituteName()
    {
        $instituteName = array(
            "Green Tech Bangladesh",
            "Dhaka Tech",
            "University of Rajshahi",
            "Islamic University, Bangladesh",
            "Khulna University of Engineering & Technology",
            "Wuhan University",
            "Mirpur  Technology",
            "Oxford Soft",
            "Shapaur Tek",
            "Hatao",
            "Ghotao",
            "Ministry of Education",
            "Ministry of Public Service ",
            "Barishal Zilla Porishad",
            "Cumilla School Kharash",
        );
        $index = rand(0, count($instituteName) - 1);
        return $instituteName[$index];
    }
}//class
