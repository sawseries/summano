<?php
require_once './app/eloquent.php';

class Master extends eloquent{
    
    public function all($query,$limit) {      
         $stmt= eloquent::fetchrow($query,$limit,'desc');
         return $stmt;       
    }    
    
    public function find($query) {        
         $stmt= eloquent::first($query);
         return $stmt;       
    }    
    
    public static function updates(Array $data){
        $sql = "update tbl_menu set title=:title,type=:type,link=:link,file=:file,root=:root where id=:id";
        $stmt= DB()->prepare($sql);
//        $stmt->execute($data);  
    }
    
    public function delete($taskId) {
        $sql = 'DELETE FROM tbl_menu WHERE id = :task_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':task_id', $taskId);
        $stmt->execute();        
        return $stmt->rowCount();
    }    
    
}