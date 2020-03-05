<?php
/**
 * Created by IntelliJ IDEA.
 * User: G7
 * Date: 3/5/2020
 * Time: 8:47 PM
 */

namespace App\administration;


use App\administration\Administration;

class Administration_Repo_Impl implements Administration_Repo_I
{
    public function save(Administration $administration)
    {
        error_log("Administration create : ");
        $id = -1;
        try {
            $administration->save();
            $id = $administration->id;
        } catch (Exception $e) {
            $saveStatus = false;
            error_log("Saveing Administration Failed.");
            // error_log("Saveing Post Failed. : " . $e);
        }
        return $id;
    }


}
