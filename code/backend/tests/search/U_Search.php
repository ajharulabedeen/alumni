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
//        $this->search_basic(10, "ASC", "batch", "dept", 'EE');
        $this->search_basic_count(10, "ASC", "batch", "dept", 'EE');
    } //main test

    public function testBasicCount()
    {
        $this->search_basic_count(10, "ASC", "batch", "dept", 'EE');
    }

    public function search_basic_count(string $per_page, string $sort_by, string $sort_on, string $columnName, string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_basic_count($per_page, $sort_by, $sort_on, $columnName, $key);
//        dd($data);
        error_log($data);
        $this->assertEquals($data, '1444');
        $this->assertTrue(($data != null));
    }

    public function testBasicSearch()
    {
        $this->search_basic(10, "ASC", "batch", "dept", 'EE');
    }

    //done
    public function search_basic(string $per_page, string $sort_by, string $sort_on, string $columnName, string $key): void
    {
        $repo = new Search_Repo_Impl();
        $data = $repo->search_basic($per_page, $sort_by, $sort_on, $columnName, $key);
//        dd($data);
        $this->assertTrue(($data != null));
        for ($i = 0; $i < 10; $i++) {
            error_log("Name : " . $data[$i]->first_name . $data[$i]->last_name . "--" . "Batch : " . $data[$i]->batch);
        }
    }


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
