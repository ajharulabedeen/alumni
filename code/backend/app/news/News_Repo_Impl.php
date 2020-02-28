<?php
/**
 * Created by PhpStorm.
 * User: G7
 * Date: 2/27/2020
 * Time: 10:57 PM
 */

namespace App\news;


use function GuzzleHttp\Psr7\_parse_request_uri;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class News_Repo_Impl implements News_Repo_I
{
    public function save(News $news)
    {
        // TODO: Implement save() method.
        try {
            $news->save();
            return $news->id;
        } catch (\Exception $e) {
            error_log("Error in News Saving!");
            return "fail";
        }
    }

    public function update(News $news)
    {
        try {
            $old_news = News::find($news->id);
            $old_news = $news;
            return $old_news->update();
//             "ok";
        } catch (\Exception $e) {
            error_log("Update Failed!");
            return "fail";
        }
    }

    public function findOne(string $id)
    {
        try {
            return News::find($id);
        } catch (\Exception $e) {
            error_log("Error in reading one news!");
            return "read_fail";
        }
    }

    public function delete(string $id)
    {
        try {
            return News::find($id)->delete();
        } catch (\Exception $e) {
            error_log("Error in reading one news!");
            return "read_fail";
        }
    }

    public function getAllNews($per_page, $sort_by, $sort_on)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        return News::orderBy($sort_on, $order)->paginate($per_page)->all();
    }

    public function countAll()
    {
        return News::count();
    }
}