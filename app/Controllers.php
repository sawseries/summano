<?php

require_once './app/BaseController.php';

class Controllers extends BaseController{

    public static $limit;
    public static $links;

    public function set_limit($limit) {
        self::$limit = $limit;
    }

    public function fetchrow($query, $limit, $sort) {

        $page = 1;
        self::set_limit($limit);
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        
        $result = $query;
        self::$links = self::page_links(self::get_path(), $query, $page);
                
        //$result .= " "."order by id $sort ";
        $result = self::page_limit($query, $page, $limit,$sort);
        $stmt = eloquent::fetch($result);

        return $stmt;
    }
    
    
    function current_url()
{
    $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $validURL = str_replace("&", "&amp", $url);
    return $validURL;
}

    public function get_path() {
        $controller = "master";
        $action = "search";

        if (isset($_GET['controller']) && isset($_GET['action'])) {
           return $_SERVER['REQUEST_URI'];
        } else {
           return "?controller=Master&action=index";
        }
        //return $_SERVER['REQUEST_URI'];
               // return $_REQUEST['link'];
               //return "./".$controller."/".$action."";
               //return
        //$path = BASEPATH;
         
        //return "?controller=".$controller."&action=".$action;
    }

    public function page_limit($query, $page, $limit,$sort) {

        $start = (($page - 1) * $limit) + 1;
        $end = $limit;

        $stmt = eloquent::fetch($query);
        //$row_cnt = count($stmt);
         $row_cnt = count($stmt);
        $row_cnt = ceil($row_cnt / self::$limit);

        if ($page != 1) {
            return $query .= " " . "order by id $sort limit $start OFFSET $end";
        } else {
            return $query .= " " . "order by id $sort limit $limit";
        }
    }

    public function page_links($path, $query, $page) {
        $stmt = eloquent::fetch($query);
        $row_cnt = count($stmt);
        //$row_cnt = 10000;     
        $row_cnt = ceil($row_cnt / self::$limit);
        $pagination = "<ul class='pagination'>";

        if ($page != 1) {
            $previous = $page - 1;
        } else {
            $previous = 1;
        }

        if ($page != $row_cnt) {
            $next = $page + 1;
        } else {
            $next = $row_cnt;
        }

        $pagination .= "<li><a href='".$path."&page=$previous'>Previous</a></li>";
        
        if($row_cnt<=10 && $page<=10){
           
            for ($i=1;$i<=$row_cnt;$i++) {
              if ($i == $page) {
                $pagination .= "<li ><a href='".$path."&page=$i' style='background-color:#87AFC7;'>$i</a></li>";
              }else {
                $pagination .= "<li><a href='".$path."&page=$i'>$i</a></li>";
              }
           }
        }else{
            
            if($page<10){
                for ($i=1;$i<=10;$i++) {
                   if ($i == $page) {
                    $pagination .= "<li><a href='".$path."&page=$i' style='background-color:#87AFC7;'>$i</a></li>";
                   }else {
                    $pagination .= "<li><a href='".$path."&page=$i'>$i</a></li>";
                   }
                }
                 $pagination.= "<li> <a href='".$path."&page=$row_cnt'> ... $row_cnt</a></li>";
            }else{
               $pagination.= "<li> <a href='".$path."&page=1'> ... 1 </a></li>";  
                if($page<=$row_cnt-10){
                  for ($i=($page-5);$i<=($page+5);$i++) {
                   if ($i == $page) {
                    $pagination .= "<li><a href='".$path."&page=$i' style='background-color:#87AFC7;'>$i</a></li>";
                   }else {
                    $pagination .= "<li><a href='".$path."&page=$i'>$i</a></li>";
                   }
                  }
                   $pagination.= "<li> <a href='".$path."&page=$row_cnt'> ... $row_cnt</a></li>";
                }else{
                    for ($i=$page;$i<=$row_cnt;$i++) {
                    if ($i == $page) {
                      $pagination .= "<li><a href='".$path."&page=$i' style='background-color:#87AFC7;'>$i</a></li>";
                    }else {
                      $pagination .= "<li><a href='".$path."&page=$i'>$i</a></li>";
                      }
                    } 
                }
            }
           
            
            
        }
        
       
        
        $pagination .= "<li><a href='".$path."&page=$next'>Next</a></li>";
        $pagination .= "</ul>";

        return $pagination;
    }
}

?>