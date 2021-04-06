<?php

$Model = array("Master");

foreach ($Model as $Mol){
   
    require_once("./model/".$Mol.".php");
}
