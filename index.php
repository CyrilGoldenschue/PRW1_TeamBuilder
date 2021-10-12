<?php
namespace TeamBuilder;
use TeamBuilder\Controller\HomeController;
use TeamBuilder\Controller\AuthController;
use TeamBuilder\Controller\MemberController;
use TeamBuilder\Controller\TeamController;

session_start();

date_default_timezone_set('Europe/Zurich');
require_once 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
$action = "";

$homeController = new HomeController();
$memberController = new MemberController();
$teamController = new TeamController();

$_SESSION['user_connected'] = AuthController::autoConnect();

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action){

    case "ListMember":
        $memberController->index();
        break;

    case "MyTeams":
        $teamController->myteam();
        break;

    default:
        $homeController->showHomePage();
        break;


}
