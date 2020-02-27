<?php
/**
 * Created by PhpStorm.
 * User: G7
 * Date: 2/27/2020
 * Time: 10:57 PM
 */

namespace App\news;


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
}