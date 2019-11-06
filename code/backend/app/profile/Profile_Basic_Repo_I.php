<?php
namespace App\profile;
use App\profile\ProfileBasic;
interface Profile_Basic_Repo_I{
    public function save(ProfileBasic $profileBasic);
    public function update(ProfileBasic $profileBasicUpdate);
    public function delete($id);
    public function findOne( $id);
    public function findOneByUser( $userId);
}
