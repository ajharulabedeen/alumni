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
}
