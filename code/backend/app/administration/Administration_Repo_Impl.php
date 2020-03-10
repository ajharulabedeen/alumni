<?php
/**
 * Created by IntelliJ IDEA.
 * User: G7
 * Date: 3/5/2020
 * Time: 8:47 PM
 */

namespace App\administration;


use App\administration\Administration;
use Illuminate\Support\Facades\DB;

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
        return ['status' => $status];
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

    public function assign_people(AdministrationPeople $administrationPeople)
    {
        error_log("Administration People Adding: ");
        $id = -1;
        $user_id = $administrationPeople->user_id;
        $role_id = $administrationPeople->role_id;
        $check = $this->check_assign($user_id, $role_id);
        if ($check['status'] == "0") {
            error_log("Check:");
            try {
                $administrationPeople->save();
                $id = $administrationPeople->id;
            } catch (Exception $e) {
                $saveStatus = false;
                error_log("Saveing Adding people to Admin role Failed!");
                // error_log("Saveing Post Failed. : " . $e);
            }
        }

        return $id;
    }

    public function remove_people(string $id)
    {
        $status = "";
        try {
            $status = AdministrationPeople::where('id', $id)->delete();
        } catch (\Exception $e) {
            error_log("Remove Admin people failed!");
            $status = "fail";
        }
        return ['status' => $status];
    }

    public function get_all_assingned_people(string $role_id)
    {
        $data = DB::table('profile_basics as b')
            ->join('administration_people',
                'administration_people.user_id',
                '=',
                'b.user_id')
            ->select(
                'b.first_name'
                , 'b.last_name'
                , 'b.email'
                , 'b.phone'
                , 'b.user_id'
                , 'administration_people.id'
                , 'administration_people.created_at'
            )
            ->where("administration_people.role_id", "=", $role_id)->get();
        return $data;
    }

    public function check_assign(string $user_id, string $role_id)
    {
        $registered = false;
        $data = AdministrationPeople::where("user_id", "=", $user_id)
            ->where("role_id", "=", $role_id)
            ->first();
//        error_log($data);
        if ($data == null) {
            $registered = "0";
        } else {
            $registered = "1";
        }
        return ["status" => $registered];
    }
}
