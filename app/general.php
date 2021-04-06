<?php

 require_once './app/Connection.php';
 require_once './app/sestion.php';
 
 define('BASEPATH',$_SERVER['DOCUMENT_ROOT']."".$_SERVER['REQUEST_URI']);
 $data = Auth::getInstance(); 
 
 function DB() {
        try {            
            $conn = new PDO("mysql:host=".connect::$connect["host"].";dbname=".connect::$connect["database"]."",connect::$connect["user"],connect::$connect["password"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
 }
 
 
function IP()
    {
         if (getenv('HTTP_CLIENT_IP'))
        $ip = getenv('HTTP_CLIENT_IP');
         else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ip = getenv('HTTP_X_FORWARDED_FOR');
         else if(getenv('HTTP_X_FORWARDED'))
        $ip = getenv('HTTP_X_FORWARDED');
         else if(getenv('HTTP_FORWARDED_FOR'))
        $ip = getenv('HTTP_FORWARDED_FOR');
         else if(getenv('HTTP_FORWARDED'))
       $ip = getenv('HTTP_FORWARDED');
         else if(getenv('REMOTE_ADDR'))
        $ip = getenv('REMOTE_ADDR');
         else
        $ip = 'UNKNOWN';
       
         return $ip;
    }