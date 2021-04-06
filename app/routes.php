<?php

class Route
{
    private $_listUri = array();
    private $_listCall = array();

    public function add($uri, $function)
    {
        $this->_listUri[] = $uri;
        $this->_listCall[] = $function;
    }

    public function submit()
    {
        foreach ($this->_listUri as $listKey => $listUri) {
            $controller = $this->_listUri[$listKey]."Controller";
            $action = $this->_listCall[$listKey];
            require_once('./Controller/'.$this->_listUri[$listKey].'Controller.php');

            $controllers = new $controller();
            $controllers->$action();
        }
    }
}

?>