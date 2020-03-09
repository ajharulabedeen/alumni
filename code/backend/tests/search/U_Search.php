<?php

namespace Tests\Unit\profile;


use App\search\Search_Repo_Impl;
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
        error_log("Search :");
//result : 9999
                $this->search_basic_count(10, "ASC", "batch", "research_interest", '%Io%');
//        $this->search_basic(10, "ASC", "batch", "research_interest", '%Io%');
//--------------------
//        $this->search_education_count(10, "ASC", "passing_year", "institue_name", '%School%');
//        $this->search_education(10, "ASC", "id", "institue_name", '%School%');
//        $this->search_education(10, "DESC", "batch", "institue_name", '%School%');
//result : 7
//        $this->search_education_count(10, "DESC", "batch", "institue_name", '%School%');
//result : 'wu' -> 1
//result : 'tiger' -> 4
//result : type->'pri' -> 9
//        $this->search_jobs(10, "DESC", "batch", "type", '%pub%');
//result : organization_name->'wu' -> 1
//result : organization_name->'tiger' -> 4
//result : type->'pri' -> 9
//        $this->search_jobs_count(10, "DESC", "batch", "type", '%pri%');


    } //main test

//    public function testEducationCount()
//    {
//        $this->search_education_count(10, "ASC", "passing_year", "institue_name", '%School%');
//    }
//    public function testEducation()
//    {
//        $this->search_education(10, "ASC", "passing_year", "institue_name", '%School%');
//    }

//    public function testBasicCount()
//    {
//        $this->search_basic_count(10, "ASC", "batch", "dept", '%EE%');
//    }

//    public function testBasicSearch()
//    {
//        $this->search_basic(10, "ASC", "batch", "dept", '%EE%');
//    }

    public function search_jobs(
        string $per_page,
        string $sort_by,
        string $sort_on,
        string $columnName,
        string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_jobs($per_page, $sort_by, $sort_on, $columnName, $key);
//        dd($data);
        $this->assertTrue(($data != null));
        for ($i = 0; $i < 10; $i++) {

            if ($data[$i] == null) {
                break;
            }
            error_log(
                $data[$i]->id
                . ' batch :' . $data[$i]->batch
                . ' uID :' . $data[$i]->user_id
                . " Name : " . $data[$i]->first_name
                . $data[$i]->last_name
                . "---institute Name : " . $data[$i]->organization_name
                . "---Type : " . $data[$i]->type
                . "---Role: " . $data[$i]->role);
        }
    }

    public function search_jobs_count(string $per_page, string $sort_by, string $sort_on, string $columnName, string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_jobs_count($per_page, $sort_by, $sort_on, $columnName, $key);
        dd($data);

    }


    public function search_education_count(string $per_page, string $sort_by, string $sort_on, string $columnName, string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_education_count($per_page, $sort_by, $sort_on, $columnName, $key);
//        dd($data);
        error_log($data);
        $this->assertTrue(($data != null));
    }

    public function search_education(string $per_page, string $sort_by, string $sort_on, string $columnName, string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_education($per_page, $sort_by, $sort_on, $columnName, $key);
//        dd($data);
        $this->assertTrue(($data != null));
        for ($i = 0; $i < 10; $i++) {

            if ($data[$i] == null) {
                break;
            }
            error_log(
                $data[$i]->id
                . ' batch :' . $data[$i]->batch
                . ' uID :' . $data[$i]->user_id
                . " Name : " . $data[$i]->first_name
                . $data[$i]->last_name
                . "---institute Name : " . $data[$i]->institue_name
                . "---Passing Year : " . $data[$i]->passing_year);
        }
    }


    public function search_basic_count(string $per_page, string $sort_by, string $sort_on, string $columnName, string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_basic_count($per_page, $sort_by, $sort_on, $columnName, $key);
//        dd($data);
        error_log($data);
//        $this->assertEquals($data, '1444');
        $this->assertTrue(($data != null));
    }


    //done
    public function search_basic(string $per_page, string $sort_by, string $sort_on, string $columnName, string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_basic($per_page, $sort_by, $sort_on, $columnName, $key);
//        dd($data);
//        $this->assertTrue(($data != null));
        for ($i = 0; $i < 10; $i++) {
            error_log("Name : " . $data[$i]->first_name . $data[$i]->last_name . "---Batch : " . $data[$i]->batch . "--research_interest:  " . $data[$i]->research_interest);
        }
    }


    //not in use, have to delete.
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

//    start : no need old code; have to delete
    public function findAboutByUserID($uesrID)
    {
        $repoProfileAbout = new Profile_About_Repo_Impl();
        $oneProfileAboutByUserID = $repoProfileAbout->findAboutByUser($uesrID);
        error_log($oneProfileAboutByUserID);
        return $oneProfileAboutByUserID;
    }

    public function update($id, $text)
    {
        error_log("--Update Test : ");
        $repoProfileAbout = new Profile_About_Repo_Impl();
        $proAbout = new ProfileAbout();
        $proAbout = $this->findOne($id);
        $proAbout->about_me = $text;
        $updateStatus = $repoProfileAbout->update($proAbout);
        $this->assertEquals(true, $updateStatus);
        return $this->findOne($id)->about_me;
    }

    public function save()
    {
        error_log("--Save Test: ");
        $repoProfileAbout = new Profile_About_Repo_Impl();
        $proAbout = new ProfileAbout();
        // $proAbout->user_id = Utils::getUserId();;
        $proAbout->user_id = "4";
        $proAbout->about_me = "Sajib : This is test about!";
        $id = $repoProfileAbout->save($proAbout);
        return $id;
    }

    public function findOne($id)
    {
        $repoProfileAbout = new Profile_About_Repo_Impl();
        $oneProfileAbout = $repoProfileAbout->findOne($id);
        return $oneProfileAbout;
    }
//    end : no need old code; have to delete

    //passed : authentication code.
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
