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
    /**
     *  @param  id here id is the primary key of the BasicRepo, it is not the userID.
     *  @return ProfileBasic    here one profile basic will be returned.
     *  @uses   currently not any use.
     */
    public function findOne( $id);
    /**
     *  @param userId where('user_id', $userId)->first();.
     *  @return ProfileBasic    here one profile basic will be returned.
     */
    public function findOneByUser( $userId);
    public function basicExist( $userId );
}
