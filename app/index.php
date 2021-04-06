<?php

require_once('./app/load.php');

$route = new Route();

if(isset($_GET['controller'])&&isset($_GET['action'])){
		$controller = $_GET['controller'];
		$action = $_GET['action'];

		$route->add($controller, $action);
		//Auth::CREATELIFETIME();		
}else{
    $controller = 'Master';
    $action = 'index';
    $route->add($controller,$action);
}

 define("controller",$controller);
 define("action",$action);

$route->submit();

