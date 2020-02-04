<?php
/**
 * Created by PhpStorm.
 * User: G7
 * Date: 2/3/2020
 * Time: 3:43 AM
 */
namespace App\search;

use App\payment\PaymentMobile;


interface Search_Repo_I
{
    public function search_basic(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key);
    public function search_basic_count(string $per_page, string $sort_by, string $sort_on, string $column_name, string $key);
}