<?php


function checkstatus($i){   
    switch($i){
        case 1 : return "<a class='btn' style='width:90px;padding:0em;background-color:#B0C4DE;color:#5499C7;'>อุปสมบท</a>"; 
        case 2 : return "<a class='btn' style='width:100px;padding:0em;background-color:#FFFF99;color:#FF9966;'>ปฏิบัติธรรม</a>";
        case 3 : return "<a class='btn' style='width:90px;padding:0em;background-color:#2E8B57;color:white;'>ลาสิกขา</a>";                
    }    
}

function checktype($i){   
    switch($i){
        case 1 : return "<a class='btn' style='width:90px;padding:0em;background-color:#B0C4DE;color:#5499C7;'>อุปสมบท</a>"; 
        case 2 : return "<a class='btn' style='width:100px;padding:0em;background-color:#FFFF99;color:#FF9966;'>ปฏิบัติธรรม</a>";
        case 3 : return "<a class='btn' style='width:90px;padding:0em;background-color:#2E8B57;color:white;'>ลาสิกขา</a>";                
    }    
}

function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
}

function user(){
    return Auth::get("fullname");
}


?>