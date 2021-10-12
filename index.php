<?php
namespace TeamBuilder;
use TeamBuilder\Controller\HomeController;
use TeamBuilder\Controller\MemberController;

session_start();

date_default_timezone_set('Europe/Zurich');
require_once 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
$action = "";

$homeController = new HomeController();
$memberController = new MemberController();

$_SESSION['user_connected'] = $memberController->autoConnect();

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action){

    case "ListMember":
        $homeController->showListMemberPage();
        break;

    default:
        $homeController->showHomePage();
        break;


}
