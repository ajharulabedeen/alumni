<?php
/**
 * Created by PhpStorm.
 * User: G7
 * Date: 2/27/2020
 * Time: 10:57 PM
 */

namespace App\news;


interface News_Repo_I
{
    public function save(News $news);

    public function findOne(string $id);

    public function update(News $news);

    public function delete(string $id);

    public function countAll();

    /**
     * @description all news, not details.
     * @param $per_page
     * @param $sort_by
     * @param $sort_on
     * @return mixed
     */
    public function getAllNews($per_page, $sort_by, $sort_on);

    public function search($per_page, $sort_by, $sort_on, $column_name, $key);

    public function search_count($column_name, $key);

}
