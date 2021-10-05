<?php
require "./src/controller/HomeController.php";
$action = "";

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action){

    default:
        $homeController = new HomeController();
        $homeController->showHomePage();
        break;


}
