<?php

require_once './app/BaseController.php';

class Insert extends BaseController{
    
    private static $data = array();
    private static $table = array();
    
    public function  __construct($table){
        self::$table = $table;
    }
    
    public function table($table){        
    self::$table = $table;  
    }
    
    public function asign($variable,$value){        
    self::$data[$variable] = $value;    
    }

     public function save(){        
        $val= self::val(self::$data);
        $set= self::set(self::$data);
        $sql = "insert into ".self::$table."(".$val.")values($set)";
        self::query($sql,self::$data);
    }
    
    public static function query($sql, Array $data) {
      
        try {
         $stmt = DB()->prepare($sql);
         $stmt->execute($data);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function set(Array $data){                  
        $set="";$i=0;        
        foreach ($data as $key => $value) {
            if ($i == 0) {
                $set .= ":".$key;
            } else {              
                $set .= ",".":".$key;
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