<?php
require "./src/controller/HomeController.php";
$action = "";

$homeController = new HomeController();

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
