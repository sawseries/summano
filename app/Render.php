<?php

class Render{

    private $data = array();
    private $render = FALSE;

    public function __construct($template) {
        $file = './ServiceLayer/vendor/boonchai/user/login/'.$template.'.php';
        try{
            if (file_exists($file)) {
                $this->render = $file;
            } else {
                throw new customException('Template'.$template.'not found!');
            }
        }catch (customException $e) {
            echo $e->errorMessage();
        }
    }

    public function run($template){

    }

    public function assign($variable, $value) {
        $this->data[$variable] = $value;
    }

    public function __destruct() {
        extract($this->data);
        include($this->render);
    }

}
