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

    public function findOne(string $id)
    {
        return Administration::find($id);
    }

    public function delete(string $id)
    {
        $status = "";
        try {
            $status = Administration::where('id', $id)->delete();
        } catch (\Exception $e) {
            error_log("Administration delete fail!");
            $status = "fail";
        }
        return $status;
    }

    public function update(Administration $administrationUpdate)
    {
        error_log(" " . $administrationUpdate);
        $updateStatus = false;
        try {
            $administration_id = $administrationUpdate->id;
            $administrationOrgin = Administration::find($administration_id);
            $administrationOrgin->title = $administrationUpdate->title;
            $administrationOrgin->description = $administrationUpdate->description;
            $administrationOrgin->update();
            $updateStatus = true;
        } catch (Exception $e) {
            error_log("Administration Update : failed to!");
            return $updateStatus;
        }
        return ['status' => $updateStatus];
    }

    public function getAll()
    {
        return Administration::all();
    }
}