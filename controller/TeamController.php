<?php
namespace TeamBuilder\Controller;
require "vendor/autoload.php";

use TeamBuilder\Model\Team;

class TeamController
{
    public function teamInfo(){
        $team = Team::find($_GET['id']);
        require "./view/teamInfo.php";
    }



}