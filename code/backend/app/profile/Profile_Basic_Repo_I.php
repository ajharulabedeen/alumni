<?php
namespace App\profile;
use App\profile\ProfileBasic;
interface Profile_Basic_Repo_I{
    /**
     * @return  id  after save the id will be returened.
     */
    public function save(ProfileBasic $profileBasic);
    /**
     * @return  boolean status will be returned as "0" or "1".
     */
    public function update(ProfileBasic $profileBasicUpdate);
    public function delete($id);
    public function findOne( $id);
    public function findOneByUser( $userId);
    public function basicExist( $userId );
}
