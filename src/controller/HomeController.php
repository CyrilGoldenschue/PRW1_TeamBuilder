<?php

require __DIR__."/../model/Member.php";

class HomeController
{

    public function showHomePage(){
        require dirname(__DIR__, 1 ). "\model\.env.php";
        $member = Member::find($connect_user_id);
        require "./view/home.php";
    }

    public function showListMemberPage(){
        $member = Member::all();
        require "./view/memberList.php";
    }

}