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

        // $this->create();//done
        // $this->getAll(10,"ASC","last_date","10");
        // error_log($this->countAll());//done
        // error_log($this->findOnePaymentType(25)->name);//done
        // error_log($this->delete(25));//done
        // error_log($this->update(25,"---Update PT Name!")); //done
        // error_log($this->findOnePaymentType(25)->name);//done

//        --------------- OLD ------------

//        error_log($this->save());
//        error_log($this->findOne("1"));
//        error_log($this->update());
        error_log($this->delete("3"));
    }

    public function delete(string $id)
    {
        $repo = new News_Repo_Impl();
        return $repo->delete($id);
    }

    public function update()
    {
        $repo = new News_Repo_Impl();
        $news = $this->findOne(2);
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
        $news->title = "Alumni Ready!";
        $news->description = "Test News! Alumni Project is Ready!";
        $news->notes = "Test News!";
        $news->post_date = date("Y-m-d h:i:s");
        return $repo->save($news);
    }

    public function PT_CRUD()
    {

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

    public function countAll()
    {
        return PaymentType::count();
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

    /**
     * A basic test example.
     *
     * @return void
     */
    public function create()
    {
        $repoPayment = new Payment_Type_Repo_Impl();
        $p = new PaymentType();
        $p->name = "MeetUp 22";
        $p->description = "Picnic";
        $p->start_date = "2022-06-01";
        $p->last_date = "2022-06-07";
        $p->amount = "700";

        $id = $repoPayment->create($p);
        return $id;
    }

//   end :  old code
}//class
