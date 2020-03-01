<?php

namespace Tests\Unit;

use App\news\News;
use App\news\News_Repo_Impl;
use App\payment\Payment_Type_Repo_Impl;
use App\payment\PaymentType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class U_News_Test extends TestCase
{
    public function testMain()
    {
//        $this->dummyDataInsertion();
//        error_log($this->save());
//        error_log($this->findOne("1"));
//        error_log($this->update());
//        error_log($this->delete("307"));
//        error_log($this->countAll());
        $this->getAllNews("10", "DESC", "post_date");
//        $this->search("10", "DESC", "post_date", "title", "PHP");
//        $this->search_count("title", "PHP");
    }

    public function search_count($column_name, $key)
    {
        $repo = new News_Repo_Impl();
        $data = $repo->search_count($column_name, $key);
        error_log($data);
    }

    public function search($per_page, $sort_by, $sort_on, $column_name, $key)
    {
        $repo = new News_Repo_Impl();
        $data = $repo->search($per_page, $sort_by, $sort_on, $column_name, $key);
        foreach ($data as $x => $k) {
            error_log($k);
        }
    }

    public function getAllNews($per_page, $sort_by, $sort_on)
    {
        $repo = new News_Repo_Impl();
        $data = $repo->getAllNews($per_page, $sort_by, $sort_on);
        foreach ($data as $x => $k) {
            error_log($k);
        }
        //        dd($data);
        return $repo->countAll();
    }

    public function countAll()
    {
        $repo = new News_Repo_Impl();
        return $repo->countAll();
    }

    public function delete(string $id)
    {
        $repo = new News_Repo_Impl();
        return $repo->delete($id);
    }

    public function update()
    {
        $repo = new News_Repo_Impl();
        $news = $this->findOne(303);
        $news->title = "Test Update!";
        return $repo->update($news);
    }

    public function findOne(string $id)
    {
        $repo = new News_Repo_Impl();
        $news = $repo->findOne($id);
        return $news;
    }

    public function save()
    {
        $repo = new News_Repo_Impl();
        $news = new News();
        $news->user_id = "10";
        $news->title = "Alumni Ready!";
        $news->description = "Test News! Alumni Project is Ready!";
        $news->notes = "Test News!";
        $news->post_date = date("Y-m-d h:i:s");
        return $repo->save($news);
    }


//   start :  old code

    /**
     * @return PaymentType return a single payment Type.
     */
    public function findOnePaymentType($id)
    {
        $repo = new Payment_Type_Repo_Impl();
        return $repo->findOnePaymentType($id);
    }

    public function getAll($per_page, $sort_by, $sort_on, $postID)
    {
        error_log(" per_page : " . $per_page);
        error_log(" sort_by : " . $sort_by);
        error_log(" sort_on : " . $sort_on);
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        // $data = PaymentType::orderBy($sort_on,$order)->stapaginate($per_page)->all();
        // $data = PaymentType::orderBy($sort_on,$order)->sta;
        // print_r($data);
        for ($i = 0; $i < 10; $i++) {
            error_log($data[$i]->last_date);
        }
        // dd($data);
        // return PaymentType::orderBy($sort_on,$order)->paginate($per_page)->all();
    }
    //   end :  old code

//    start : dummy data insertion
    public function dummyDataInsertion()
    {
        for ($x = 0; $x < 100; $x++) {
            $repo = new News_Repo_Impl();
            $news = new News();
            $news->user_id = rand(1, 10);
            $news->title = $this->getTitle();
            $news->description = $this->getTitle() . "Description!";
            $news->notes = "Test Notes!";
            $news->post_date = $this->getDate();
            error_log($repo->save($news));
        }
    }

    public function getTitle()
    {
        $title = array("WorkShoop in PHP",
            "Meet Up 2020 completed!",
            "GUB Meeting about STI",
            "CSE carnival finished successfully",
            "Dhaka IT Job Fair in Green University",
            "Annual Picnic with cultural events",
            "Workshop in Python for Arduno",
            "PHP seminar for Wordpress",
            "How to Pubslishing Research Article in high IF",
            "Family Get together of Alumnies",
            "Winter Carity in the of the country",
            "Regular Blood Donation ",
            "Training : NSU Programming Contest");
        $index = rand(0, count($title) - 1);
        return $title[$index];
    }

    public function getDate()
    {
        $y = rand(2017, 2025);
        $m = rand(1, 9);
        $d = rand(10, 28);
        $date = $y . "-" . "0" . $m . "-" . $d;
        return $date;
    }

//    end : dummy data insertion
}//class
