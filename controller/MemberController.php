<?php
namespace TeamBuilder\Controller;
require "vendor/autoload.php";

use TeamBuilder\Model\Member;

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

    public function listModo(){
        $members = Member::all();
        require "./view/modoList.php";
    }


}