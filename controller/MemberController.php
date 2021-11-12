<?php
namespace TeamBuilder\Controller;
require "vendor/autoload.php";

use TeamBuilder\Model\Member;
use TeamBuilder\Model\Role;
use TeamBuilder\Model\Status;

class MemberController
{

    public function index(){
        $members = Member::all();
        require "./view/memberList.php";
    }

    public function myTeam(){
        $member = Member::find($_SESSION['user_connected']->id);
        require "./view/myTeamList.php";
    }

    public function myProfile(){
        $member = Member::find($_SESSION['user_connected']->id);
        require "./view/myProfile.php";
    }

    public function profile(){
        $member = Member::find($_GET['id']);
        require "./view/myProfile.php";
    }

    public function editProfile(){
        $member = Member::find($_GET['id']);
        $roles = Role::all();
        $status = Status::all();
        require "./view/editProfile.php";
    }

    public function updateProfile(){
        // TODO il faut ajouté le message de confirmation du succès
        $member = Member::find($_GET['id']);
        if(isset($_GET['name'])) {
            $member->name = $_GET['name'];
        }
        if(isset($_GET['role']) && isset($_GET['statu'])) {
            $member->role_id = $_GET['role'];
            $member->status_id = $_GET['statu'];
        }
        $member->save();
        $this->profile();
    }

    public function listModo(){
        $members = Member::all();
        require "./view/modoList.php";
    }


}