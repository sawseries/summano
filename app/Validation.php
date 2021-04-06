<?php

require_once './app/Controllers.php';

class Validation extends Controllers{
    
  public static function validate($data){
         $urlArray=[];
         foreach($data as $key => $value){
            $urlArray[$key] =  $value;            
         }
         return $urlArray;
  }
  
}
      