<?php

require_once './app/BaseController.php';

class Deletes extends BaseController{
    
    private static $data = array();
    private static $table = array();
    private static $sql;
    private static $where;


    public function  __construct($table){
        self::$table = $table;
    }
    
    public static function table($table){        
    self::$table = $table;  
    }
    
    public static function asign($variable,$value){        
     self::$data[$variable] = $value;    
    }

     public function save(){        
   
        //$set= self::set(self::$data);
        $where = self::$where; 
        $sql = "DELETE from ".self::$table." where $where";
        
        //$sql = "UPDATE tbl_data SET iden=:iden,fname_TH=:fname_TH,lname_TH=:lname_TH WHERE id=:id";
        //echo $sql;
        self::query($sql);
    }
    
    public static function query($sql) {
        $stmt = DB()->prepare($sql);
        $stmt->execute();
    }
    
    public static function set(Array $data){                  
        $set="";$i=0;        
        foreach ($data as $key => $value) {
            if ($i == 0) {
                $set .= $key." = :".$key;
            } else {              
                $set .= ",".$key." = :".$key;
            }
            $i++;
        }
        return $set;
    }
    
    public static function where($variable){        
     self::$where = $variable;  
     //self::$data[$variable] = $value;  
    }
    
    public static function strwhere(Array $data){  
           
        $set="";$i=0;
        
        foreach ($data as $key => $value) {
            if ($i == 0) {
                $set .= $key." = :".$key;
            } else {              
                $set .= " and ".$key." = :".$key;
            }
            $i++;
        }
        return $set;        
    }
    
     public static function val(Array $data){
         $val="";
         $i = 0;
         foreach ($data as $key => $value) {
            if ($i == 0) {
                $val .=$key;           
            } else {
                $val .= ",".$key;         
            }
            $i++;
        }
         
        
        return $val;
    }
    
    
    
      
}