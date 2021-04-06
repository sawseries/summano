<?php

date_default_timezone_set('Asia/Bangkok');
header('HTTP/1.1 200 OK');


require_once './index.php';
require_once './Autoload.php';
require_once './app/View.php';
//require_once './app/Link.php';
require_once './app/Helpper/Global.php';
require_once './app/Redirect.php';
require_once './app/Render.php';
require_once './app/sestion.php';
require_once './app/Template/Header.php';
require_once './app/Template/Footer.php';
require_once './app/Template/path.php';
require_once './app/Controllers.php';
require_once './app/eloquent.php';
require_once './app/Connection.php';
require_once './app/general.php';
require_once './app/Validation.php';
require_once './app/insert.php';
require_once './app/update.php';
require_once './app/delete.php';
//require_once('./ApplicationLayer/Mpdf/mpdf.php');
//require_once('./Applicationlayer/tcpdf/tcpdf/tcpdf.php');
//require_once('./Applicationlayer/tcpdf/tcpdf/class/class_curl.php');
require_once './app/routes.php';
require_once './app/BaseController.php';
require_once './app/index.php';



?>