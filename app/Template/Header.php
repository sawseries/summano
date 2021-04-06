<?php
require_once './app/Helpper/Global.php';
$html="<html>";
$html.="<head>";    
$html.="<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>";

$html.="<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";
$html.="<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>";
$html.="<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js'></script>";   

$html.="<link rel='stylesheet' href='asset/css/bootstrap4.0.min.css'>";

$html.="<link rel='stylesheet' href='asset/css/style.css'>";
$html.="<script src='asset/js/jquery3.2.min.js' crossorigin='anonymous'></script>";
$html.="<script src='asset/js/bootstrap4.0.min.js' crossorigin='anonymous'></script>";
$html.="</head>";
$html.="<div class='login_bg'>";
$html.="<nav class='navbar navbar-default navbar-fixed-top' style=''>";
$html.="<div class='navbar-header'>";
$html.="<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>";
$html.="<span class='sr-only'>Toggle navigation</span>";
$html.="<span class='icon-bar'></span>";
$html.="<span class='icon-bar'></span>";
$html.="</button>";
$html.="<a class='navbar-brand' href='./?controller=master&action=index'>BACKEND 2021</a>";
$html.="</div>";
$html.="<div id='navbar' class='navbar-collapse collapse'>";          
$html.="<ul class='nav navbar-nav'>";
$html.="<li class='active'><a href='./?controller=master&action=index'>Home</a></li>";
$html.="</ul>";
$html.="</div>"; 
$html.="</nav>";

define("LOGIN", $html);



$header="<!DOCTYPE html>";
$header.="<html lang='en'>";
$header.="<head>";
$header.="<title>Ticket</title>";
$header.="<meta charset='utf-8'>";
$header.="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$header.="<link rel='stylesheet' href='./asset/css/bootstrap3.4.min.css'>";
$header.="<script src='./asset/js/bootstrap3.4.min.js'></script>";
$header.="<script src='./asset/js/jquery3.4.min.js'></script>";
$header.="<script src='./asset/js/jquery.validate.min.js'></script>";
$header.="<script src='./asset/control/control.js'></script>";


$header.="<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>";
$header.="<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>";
$header.="<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>";
$header.="<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>";
$header.="<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js'></script>";



$header.="<link rel='stylesheet' href='./../asset/chart/t.css'>";
$header.="<link rel='stylesheet' href='./asset/css/mystyle.css'>";
$header.="<link rel='stylesheet' href='./asset/css/grid.css'>";
$header.="<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>";
$header.="</head>";
$header.="<div style='background-color:#F5F5F5;'>";  
$header.="<nav class='navbar navbar-default navbar-fixed-top' style=''>";
$header.="<div class='navbar-header'>";
$header.="<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>";
$header.="<span class='sr-only'>Toggle navigation</span>";
$header.="<span class='icon-bar'></span>";
$header.="<span class='icon-bar'></span>";
$header.="</button>";
$header.="<a class='navbar-brand' href='./?controller=master&action=index'>BACKEND 2021</a>";
$header.="</div>";
$header.="<div id='navbar' class='navbar-collapse collapse'>";          
$header.="<ul class='nav navbar-nav'>";
$header.="<li class='active'><a href='./?controller=master&action=index'>Home</a></li>";
$header.="</ul>";
$header.="<ul class='nav navbar-nav navbar-right'>";
$header.="<li><a href='#'><b>ยินดีต้อนรับ ::".user()."</b></a></li>";
$header.="<li>";
$header.="<a href='./?controller=Login&action=logout' class='btn' style='width:60px;height: 30px;padding: 0em;margin-top:10px;color: gray;background-color:#EBF4FA;border: 2px solid  #dddddd;'>";
$header.="logout";
$header.="</a>";
$header.="</li>";
$header.="<li><a href=''></a></li>";    
$header.="</ul>";
$header.="</div>"; 
$header.="</nav>";

define("HEADERS", $header);