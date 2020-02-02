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


class Search_Repo_Impl
{
    public function search_by_name(string $columnName,string $key)
    {
        $data = ProfileBasic::where($columnName, 'LIKE' ,$key)->get();
        return $data;
    }
}