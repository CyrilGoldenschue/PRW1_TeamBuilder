<?php

namespace TeamBuilder\Controller;
require "vendor/autoload.php";

use TeamBuilder\Model\Member;
use TeamBuilder\Model\Team;

class TeamController
{
    public function teamInfo()
    {
        $team = Team::find($_GET['id']);
        require "./view/teamInfo.php";
    }

    public function createTeam()
    {
        $error = "";
        require "./view/createTeam.php";
    }

    public function create()
    {

        $team = Team::make(["name" => $_GET["nameTeam"], "state_id" => 1]);
        if ($team->create() && $_GET["nameTeam"]!=""):
            if ($team->addMember(["member_id" => $_SESSION['user_connected']->id])):
                $team->changeCaptain(["member_id" => $_SESSION['user_connected']->id]);
                $member = Member::find($_SESSION['user_connected']->id);
                require "./view/myTeamList.php";
            endif;
        else:
            $error = '<div class="alert alert-danger" role="alert">
                        Le nom entré n\'est pas autorisé merci d\'en choisir un autre.
                      </div>';
            require "./view/createTeam.php";
        endif;


    }


}