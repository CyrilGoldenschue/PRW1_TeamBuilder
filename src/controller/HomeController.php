<?php

require __DIR__."/../model/Member.php";

class HomeController
{

    public function showHomePage(){
        require __DIR__ . "/../model/.env.php";
        $member = Member::find($connect_user_id);
        require "view/home.php";
    }

}