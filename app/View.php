<?php

class View {

    private static $data = array();
    private static $render = FALSE;

    public function __construct($template) {        
       $file = './view/'.$template.'.php';  
       try{
            if (file_exists($file)) {                                
                self::$render = $file;             
            } else {
                throw new customException('Template ' . $template . ' not found!');
            }
          }catch (customException $e) {
            echo $e->errorMessage();
      }
    }
   
    public function assign($variable, $value) {
        self::$data[$variable] = $value;
     
    }

    public function __destruct() {
        extract(self::$data);
        include(self::$render);
    }

}
