<?php

require_once './app/Controllers.php';

class eloquent extends Controllers{
   
   public static function fetch($result) {
        $stmt = DB()->query($result)->fetchAll();
        return $stmt;
    }

    public static function query($sql, Array $data) {
        $stmt = DB()->prepare($sql);
        $stmt->execute($data);
    }

    public static function insert($table, Array $data) {
                
        $val= self::val($data);
        $set= self::set($data);
        $sql = "insert into $table($val) values($set)";
        
        //echo $sql;
        self::query($sql,$data);
    }
    
    public static function first($query){        
       $STH = DB()->query($query);
       $result = $STH->fetch(); 
       return $result;
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
    
    