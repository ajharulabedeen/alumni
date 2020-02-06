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
use Illuminate\Support\Facades\DB;


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
        $data = ProfileBasic::where($column_name, $like, $key)->orderBy($sort_on, $order)->paginate($per_page)->all();
        return $data;
    }

    public function search_basic_count(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        $like = 'LIKE';
        $data = ProfileBasic::where($column_name, $like, $key)->count();
        return $data;
    }


    public function search_education(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        // TODO: Implement search_education() method.
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }

        $data = DB::table('profile_basics as b')
            ->join('profile_education', 'profile_education.user_id', '=', 'b.user_id')
            ->select(
                'b.user_id'
                , 'b.first_name'
                , 'b.last_name'
                , 'b.student_id'
                , 'b.dept'
                , 'b.batch'
                , 'profile_education.*')
            ->where('profile_education.' . $column_name, 'LIKE', $key)->orderBy($sort_on, $order)->paginate($per_page);
        return $data;
    }

    public function search_education_count(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        $data = DB::table('profile_basics')
            ->join('profile_education', 'profile_basics.user_id', '=', 'profile_education.user_id')
            ->where('profile_education.' . $column_name, 'LIKE', $key)->count();
        return $data;
    }

    public function search_jobs(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        // TODO: Implement search_org() method.
        if ($sort_by == "ASC") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }

        $data = DB::table('profile_basics as b')
            ->join('profile_jobs', 'profile_jobs.user_id', '=', 'b.user_id')
            ->select(
                'b.user_id'
                , 'b.first_name'
                , 'b.last_name'
                , 'b.student_id'
                , 'b.dept'
                , 'b.batch'
                , 'profile_jobs.*')
            ->where('profile_jobs.' . $column_name, 'LIKE', $key)->orderBy($sort_on, $order)->paginate($per_page);
        return $data;
    }

    public function search_jobs_count(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key)
    {
        // TODO: Implement search_org_count() method.
        $data = DB::table('profile_basics')
            ->join('profile_jobs', 'profile_basics.user_id', '=', 'profile_jobs.user_id')
            ->where('profile_jobs.' . $column_name, 'LIKE', $key)->count();
        return $data;
    }

}//class