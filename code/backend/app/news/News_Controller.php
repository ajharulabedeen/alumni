<?php

namespace App\Http\Controllers;

use App\news\News;
use App\news\News_Repo_I;
use App\news\News_Repo_Impl;
use Illuminate\Http\Request;
use App\profile\ProfileAbout;
use App\Utils\Utils;

class News_Controller extends Controller
{
    protected $newsRepo;

    public function __construct(News_Repo_I $newsRepo)
    {
        // $this->middleware('auth:api');
        $this->newsRepo = $newsRepo;
    }

    /**
     * conpleted. afterinsertion id will be backed.
     */
//    public function save(News $r) // will not work
    public function save(Request $r)
    {
//        dd($r);
        $news = new News();
        $news->user_id = Utils::getUserId();
        $news->title = $r->title;
        $news->description = $r->description;
        $news->notes = $r->title;
        $news->post_date = date("Y-m-d h:i:s");
        return $this->newsRepo->save($news);
    } //

    public function delete(Request $r)
    {
        error_log($r->id);
        return ['status' => $this->newsRepo->delete($r->id)];
    }

    //refactor : from font end have to send all the data else not given data will be saved as.
    public function update(Request $r)
    {
        $news = new News();
        $news = $this->newsRepo->findOne($r->id);
        $news->user_id = Utils::getUserId();
        $news->title = $r->title;
        $news->description = $r->description;
        $news->notes = $r->title;
        $news->post_date = date("Y-m-d h:i:s");
//        return ["status" => $this->newsRepo->update($news)];
        return $this->newsRepo->update($news);
    }


    public function getAboutByUserId()
    {
//        $user_id = Utils::getUserId();
//        return $this->aboutRepo->findAboutByUser($user_id);
    }


}//class
