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
            error_log($old_news);
            $old_news = $news;
            error_log("Update");
            $id = $old_news->update();
            error_log($id);
            return (string) $id;
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
//        error_log($id);
        $res = '';
        try {
            $news = News::find($id);
            if ($news != null) {
                $res = $news->delete();
            } else {
                $res = "fail";
            }
        } catch (\Exception $e) {
            error_log("Error in reading one news!");
            $res = "read_fail";
        }

        return $res;
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

    public function search($per_page, $sort_by, $sort_on, $column_name, $key)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        $like = 'LIKE';
//        $key='%' . $key;
        $key = $key . '%';
        $data = News::where($column_name, $like, $key)->orderBy($sort_on, $order)->paginate($per_page)->all();
        return $data;
    }

    public function search_count($column_name, $key)
    {
        $like = 'LIKE';
        $key = $key . '%';
        $data = News::where($column_name, $like, $key)->count();
        return $data;
    }


}