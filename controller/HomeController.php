<?php

namespace TeamBuilder\Controller;

use TeamBuilder\Controller\MemberController;
use TeamBuilder\Model\Member;
class HomeController
{
    private MemberController $memberController;

    public function __construct()
    {
        $this->memberController = new MemberController();
    }


    public function showHomePage(){
        require "./view/home.php";
    }



}