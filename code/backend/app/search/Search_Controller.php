<?php

namespace App\Http\Controllers;

use App\search\Search_Repo_I;
use App\search\Search_Repo_Impl;
use Illuminate\Http\Request;

class Search_Controller extends Controller
{

    protected $search_Repo;

    public function __construct(Search_Repo_I $search_Repo)
    {
        error_log("Constructor : Search_Controller");
        // $this->middleware('auth:api');
        $this->search_Repo = $search_Repo;
    }

    public function search_basic(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        $column_name = $r->column_name;
        $key = $r->key;
        return $this->search_Repo->search_basic($per_page, $sort_by, $sort_on, $column_name, $key);
    }
    public function search_basic_count(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        $column_name = $r->column_name;
        $key = $r->key;
        $data = $this->search_Repo->search_basic_count($per_page, $sort_by, $sort_on, $column_name, $key);
        return ['status' => $data];
    }

    public function search_education(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        $column_name = $r->column_name;
        $key = $r->key;
        return $this->search_Repo->search_education($per_page, $sort_by, $sort_on, $column_name, $key);
    }
    public function search_education_count(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        $column_name = $r->column_name;
        $key = $r->key;
        $data = $this->search_Repo->search_education_count($per_page, $sort_by, $sort_on, $column_name, $key);
        return ['status' => $data];
    }

    public function search_jobs(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        $column_name = $r->column_name;
        $key = $r->key;
        return $this->search_Repo->search_jobs($per_page, $sort_by, $sort_on, $column_name, $key);
    }
    public function search_jobs_count(Request $r)
    {
        $per_page = $r->per_page;
        $sort_by = $r->sort_by;
        $sort_on = $r->sort_on;
        $column_name = $r->column_name;
        $key = $r->key;
        $data = $this->search_Repo->search_jobs_count($per_page, $sort_by, $sort_on, $column_name, $key);
        return ['status' => $data];
    }


    public function getApprovedUserDetails(Request $r)
    {
//        $user_id = $r->user_id;
//        $data = $this->paymentMobileRepo->approved_by_userDeatils($user_id);
//        $user_details = ['name' => $data[0]['first_name'] . ' ' . $data[0]['last_name'], 'phone' => $data[0]['phone']];
//        return $user_details;
    }

    //end :  payment admin

}//class
