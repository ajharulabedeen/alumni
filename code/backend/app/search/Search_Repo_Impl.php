<?php
/**
 * Created by PhpStorm.
 * User: G7
 * Date: 2/3/2020
 * Time: 3:43 AM
 */

namespace App\search;

use App\payment\PaymentMobile;
use App\profile\ProfileBasic;


class Search_Repo_Impl implements Search_Repo_I
{
    public function search_basic(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        $like = 'LIKE';
//        $key='%' . $key;
        $key = $key . '%';
        $data = ProfileBasic::where($column_name, $like, $key)->orderBy($sort_on, $order)->paginate($per_page)->all();
        return $data;
    }

    public function search_basic_count(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        // TODO: Implement search_basic_count() method.
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        $like = 'LIKE';
//        $key='%' . $key;
        $key = $key . '%';
        $data = ProfileBasic::where($column_name, $like, $key)->orderBy($sort_on, $order)->count();
        return $data;
    }
}//class