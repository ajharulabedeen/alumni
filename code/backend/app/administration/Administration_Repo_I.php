<?php
/**
 * Created by IntelliJ IDEA.
 * User: G7
 * Date: 3/5/2020
 * Time: 8:47 PM
 */

namespace App\administration;


interface Administration_Repo_I
{
    public function save(Administration $administration);

    public function findOne(string $id);

    /*
     * @return ['status' => $status] jSON data format will be retunned.
     */
    public function delete(string $id);

    public function update(Administration $administrationUpdate);

    public function getAll();

    public function assign_people(AdministrationPeople $administrationPeople);

    /**
     * @param string $id
     * @return mixed return ['status' => $status];
     */
    public function remove_people(string $id);

    public function get_all_assingned_people(string $role_id);

    /**
     * @param string $user_id
     * @param string $role_id
     * @return mixed return ["status" => $registered];
     */
    public function check_assign(string $user_id, string $role_id);
}
