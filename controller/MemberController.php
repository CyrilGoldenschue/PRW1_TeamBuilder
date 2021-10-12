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



}