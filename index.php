<?php

require_once "App/Controller/DashboardController.php";
require_once "App/Controller/ProductController.php";



$modun = $_GET["modun"] ?? "";
$action = $_GET["action"] ?? "";

switch($modun):
    case "Product":
        $controller = new ProductController();
        if($action == "create"){
            $controller->create();
        }else{
            $controller->index();
        }
        
    break;

    default:
        $controller = new DashboardController();
        $controller->index();
    break;
endswitch;







