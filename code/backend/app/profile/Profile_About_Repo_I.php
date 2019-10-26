<?php

use App\profile\ProfileAbout;

interface Profile_About_Repo_I {
    public function save(ProfileAbout $profileAbout);
    public function edit(ProfileAbout $profileAboutUpdate);
    public function delete($id);
    public function findOne( $id);
}
