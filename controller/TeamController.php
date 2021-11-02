<?php
namespace TeamBuilder\Controller;
require "vendor/autoload.php";

use TeamBuilder\Model\Member;
use TeamBuilder\Model\Team;

class TeamController
{
    public function teamInfo(){
        $team = Team::find($_GET['id']);
        require "./view/teamInfo.php";
    }

    public function createTeam(){
        require "./view/createTeam.php";
    }

    public function create(){
        $member = Member::find($_SESSION['user_connected']->id);
        require "./view/myTeamList.php";
    }



}