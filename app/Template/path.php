<?php


$controller;
$action;


if(isset($_GET['controller'])&&isset($_GET['action'])){
	    $controller = $_GET['controller'];
	    $action = $_GET['action'];
	
}else{
            $controller = 'Master';
            $action = 'index';

}
