<?php

namespace Tests\Unit\profile;

use App\profile\ProfileBasic;
use Tests\TestCase;
use App\profile\ProfileBasic_Repo_Impl;
use App\Utils\Utils;

$repoProfileBasic =  new ProfileBasic_Repo_Impl();

$id = null;

class UTest_ProfileBasicRepo extends TestCase
{

    /**
     * Mother test
     * This method will w$ork as mother test method.
     * all other test method will be called from here.
     * So test skip can be easily achived.
     *
     */
    public function testMain()
    {
        echo "\n >----------- Test Main : ---------> \n";
        // $id = $this->save();
        // $this->findOne($id);

        // $this->delete();
        // $this->findOne(3);
        // $this->getCurrentLoggedUserID();
        // $this->update();
        // $this->objectConvertion();
        // $this->basicCRUD();


        $this->insertingManyProfile();
        // $this->getPhoneNumber();
        // $this->getDept();
    } //main test

    public function basicCRUD()
    {
        $id = $this->save();
        $basic = $this->findOne($id);
        $this->assertEquals($id, $basic->id);
        error_log($basic);

        $text = "My Skills!";
        $updatedText = $this->update($id, $text);
        $this->assertEquals($text, $updatedText);
        error_log($this->findOne($id));

        $status = $this->delete($id);
        $this->assertEquals(1, $status);

        error_log("\nAbout CRUD Test Done!\n");
    }
    //passed.
    public function save()
    {

        // dept,
        // batch,
        // student_id,
        // first_name,
        // last_name,
        // birth_date,
        // gender,
        // blood_group,
        // email,
        // phone,
        // research_interest,
        // skills

        // $repoProfileBasic = $this->getRepo();
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $pBasic = new ProfileBasic();
        $pBasic->user_id = Utils::getUserId();;
        $pBasic->first_Name = "Khan";
        $pBasic->last_Name = "Ajhar";
        $pBasic->dept = "CSE";
        $id = $repoProfileBasic->save($pBasic);
        error_log("User ID after Save  : " . $id);
        $this->findOne($id);
        return $id;
    }
    //passed.
    public function delete($id)
    {
        // $repoProfileBasic = $this->getRepo();
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $status = $repoProfileBasic->delete($id);
        error_log("User ID after Save  : " . $status);
        return $status;
    }
    //passed
    public function findOne($id)
    {
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $oneProfileBasic = $repoProfileBasic->findOne($id);
        // error_log($oneProfileBasic);
        return $oneProfileBasic;
    }
    public function update($id, $text)
    {
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        $pBasic = new ProfileBasic();
        $pBasic = $this->findOne($id);
        error_log($pBasic->skills);
        $pBasic->skills = $text;
        $status = $repoProfileBasic->update($pBasic);
        // $this->assertEquals(true, $status);
        return $this->findOne($id)->skills;
    }
    //passed
    public function getCurrentLoggedUserID()
    {
        $id = Utils::getUserId();
        error_log($id);
    }

    public function getRepo()
    {
        new ProfileBasic_Repo_Impl();
    }
    // -----------------------------------------------------
    public function insertingManyProfile()
    {
        $repoProfileBasic =  new ProfileBasic_Repo_Impl();
        for ($x = 0; $x < 10000; $x++) {
            $pBasic = new ProfileBasic();
            $pBasic->user_id = Utils::getUserId();;
            $pBasic->dept = $this->getDept();
            $pBasic->batch = $this->getBatchNumber();
            $pBasic->student_id = $pBasic->batch . $this->getID();
            $pBasic->first_Name = $this->getFName();
            $pBasic->last_Name = $this->getLName();
            $pBasic->birth_date = rand(1, 30) ."-". rand(1, 12) ."-". rand(1990, 2000);
            $pBasic->gender = $this->getGender();
            $pBasic->blood_group = $this->getBlood();
            $pBasic->email = $pBasic->first_Name . "@gub.com";
            $pBasic->phone = $this->getPhoneNumber();
            $pBasic->religion = $this->getReligion();
            $pBasic->research_interest = "IoT";
            $pBasic->skills = "PHP";

            $id = $repoProfileBasic->save($pBasic);
            error_log("User ID after Save  : " . $id);
        } //for
    }
    public function getReligion()
    {
        $dept = array("Islam", "Hindu", "Boudh", "Khristan", "Other");
        $index = rand(0, count($dept) - 1);
        return $dept[$index];
    }
    public function getLName()
    {
        $lName = array(
            "Labib", "Abdul Haseeb", "Abdul Kabir", "Abdul Qaadir", "Akram", "Aza", "Fujai", "Ghannam", "Ghiyath",
            "Huzayfah",
            "Jabbar", "Jabr", "Khalil", "Mahbub", "Man", "Main", "Mufaddal", "Murabbi", "Nur", "Qanit", "Qatadah", "Qays", "Ubayy",
            "Wadid", "Zaid", "Zayd", "Zaim", "Ablah", "Ajeebah", "Ameera", "Anniyah", "Ateefa", "Buhaysah", "Buhayyah", "Eshal",
            "Fiza", "Hayud", "Ibthaj", "Kaheesha", "Kashifah", "Mawiyah", "Mehrnaz", "Muruj", "Nadirah", "Qudsiyah", "Rihab",
            "Saadia", "Zuhayra", "Aatirah", "Zia", "Ziya"
        );
        return $lName[rand(0, count($lName) - 1)];
    }
    public function getFName()
    {
        $fName = array(
            "Laiba", "Manahil", "Mohammed", "Aahil", "Eshal", "Manha", "Aisha", "Aaban",
            "A\'ishah", "Aleena", "Afnan", "A\'shadieeyah", "Amelia", "Rayyan", "Zayan",
            "Rehan", "Maryam", "Aiza", "Amreen", "Usman", "Nimra", "Shaista", "Zoya", "A\'idah"
        );
        return $fName[rand(0, count($fName) - 1)];
    }
    public function getGender()
    {
        $dept = array("Male", "Female", "Other");
        $index = rand(0, count($dept) - 1);
        return $dept[$index];
    }
    public function getBlood()
    {
        $dept = array("A+", "B+", "O+", "AB+", "A-", "B-", "O-", "AB-");
        $index = rand(0, count($dept) - 1);
        return $dept[$index];
    }
    public function getDept()
    {
        $dept = array("CSE", "EEE", "TEX", "FTDM", "ENG", "BBA", "LLB");
        $index = rand(0, count($dept) - 1);
        return $dept[$index];
    }
    public function getPhoneNumber()
    {
        $phone = 0;
        for ($i = 0; $i < 11; $i++) {
            $phone .= rand(0, 10);
        }
        // error_log($phone);
        return $phone;
    }
    public function getBatchNumber()
    {
        $phone = 1;
        for ($i = 0; $i < 3; $i++) {
            $phone .= rand(1, 10);
        }
        // error_log($phone);
        return $phone;
    }
    public function getID()
    {
        $phone = rand(1, 9);
        for ($i = 0; $i < 4; $i++) {
            $phone .= rand(1, 10);
        }
        // error_log($phone);
        return $phone;
    }

    //working
    public function objectConvertion()
    {
        $pBasic1 = new ProfileBasic();
        $pBasic1->user_id = Utils::getUserId();;
        $pBasic1->first_Name = "Khan";
        $pBasic1->last_Name = "Ajhar";
        $pBasic1->dept = "CSE";

        $pBasic2 = new ProfileBasic();
        $pBasic2->user_id = Utils::getUserId();;
        $pBasic2->first_Name = "K";
        $pBasic2->last_Name = "Ar";
        $pBasic2->dept = "CPS";

        error_log($pBasic1);
        error_log($pBasic2);
        if ($pBasic1 == $pBasic2) {
            error_log("Object Are not Same!");
        }

        $pBasic1 = $pBasic2;
        error_log("-----------------");
        if ($pBasic1 == $pBasic2) {
            error_log("Same Values!");
        }
        error_log($pBasic1);
        error_log($pBasic2);
    }
}//class
