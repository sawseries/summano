<?php
require_once './app/BaseController.php';

class MasterController extends BaseController {
    
    public function __construct() {
          // Master::limit(10);  //จำนวนการแสดงผลต่อหน้า
    }

    public function index(){
         if(Auth::check()==true){
         $lists = Master::all("SELECT * FROM tbl_data",10,'desc');  
         $iden="";         
         Redirect::view("Master/index",array("lists"=>$lists,"links"=> Master::$links));
         }else{
           Redirect::to("auth/login");
         }
    }
    
    public function getCreate(){  
        Redirect::to("Master/create");
    }
    
    
  
  public function edit(){
        $data=Validation::validate($_POST);
        $file_name=$data["hdnfile"];
     
        if($_FILES['uploadedFile']['size'] <> 0){
            if (file_exists("./storage/$file_name")) {
              //mkdir("./storage/$max", 0777, true);
               unlink("./storage/$file_name");
            }             
            $fileName = $_FILES['uploadedFile']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));            
            $file_name = $data["txtiden"].date('ymd').".".$fileExtension;       
            $file_tmp =$_FILES['uploadedFile']['tmp_name'];
            
            move_uploaded_file($file_tmp,"./storage/".$file_name);     
           
         }
        
       
       $updates = new Updates('tbl_data');
       $updates->asign("pic",$file_name);
       $updates->asign("prename_TH",$data["prename_TH"]);
       $updates->asign("fname_TH",$data["fname_TH"]);
       $updates->asign("lname_TH",$data["lname_TH"]);
       $updates->asign("prename_EN",$data["prename_EN"]); 
       $updates->asign("fname_EN",$data["fname_EN"]);
       $updates->asign("lname_EN",$data["lname_EN"]);
       $updates->asign("phone",$data["txtphone"]); 
       $updates->asign("birthdate",$data['birthdate']);
       $updates->asign("Age",$data["age"]);
       $updates->asign("sex",$data["sex"]);
       $updates->asign("Address",$data["address"]);
       $updates->asign("datestart",$data["datestart"]);
       $updates->asign("dateend",$data["dateend"]);
       $updates->asign("status",1);
       $updates->asign("type",$data["txttype"]); 
       $updates->asign("contNM",$data["txtcontNM"]); 
       $updates->asign("contPH",$data["txtcontPH"]);
       $updates->asign("contAbout",$data["txtcontAbout"]); 
       $updates->asign("updated_at",date('y-m-d h:i:s')); 
       //$updates->asign("user",$data["txtuser"]); 
       $updates->where("id",$data["hdnid"]);  
       $updates->save();
       
         Redirect::para("Master","getDetail",array("success"=>"แก้ไขข้อมูลสำเร็จ","id"=>$data["hdnid"]));   
  }
    
    public function create(){
    
    $data=Validation::validate($_POST);
    $file_name="";
     
 
         if($_FILES['uploadedFile']['size'] <> 0){
            //$max = Master::find_max();
//            if (!file_exists("./storage/$max")) {
//              mkdir("./storage/$max", 0777, true);
//            }             
            $fileName = $_FILES['uploadedFile']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));            
            $file_name = $data["txtiden"].date('ymd').".".$fileExtension;       
            $file_tmp =$_FILES['uploadedFile']['tmp_name'];
            
            move_uploaded_file($file_tmp,"./storage/".$file_name);        
         }
     
       $create = new Insert("tbl_data");
       $create->asign("iden",$data["txtiden"]);
       $create->asign("pic",$file_name);
       $create->asign("prename_TH",$data["prename_TH"]);
       $create->asign("fname_TH",$data["fname_TH"]);
       $create->asign("prename_EN",$data["prename_EN"]); 
       $create->asign("fname_EN",$data["fname_EN"]);
       $create->asign("lname_EN",$data["lname_EN"]);
       $create->asign("phone",$data["txtphone"]); 
       $create->asign("birthdate",$data['birthdate']);
       $create->asign("Age",$data["age"]);
       $create->asign("sex",$data["sex"]);
       $create->asign("Address",$data["address"]);
       $create->asign("datestart",$data["datestart"]);
       $create->asign("dateend",$data["dateend"]);
       $create->asign("status",1);
       $create->asign("type",$data["txttype"]); 
       $create->asign("contNM",$data["txtcontNM"]); 
       $create->asign("contPH",$data["txtcontPH"]);
       $create->asign("contAbout",$data["txtcontAbout"]);
       $create->asign("created_at",date('y-m-d h:i:s')); 
       $create->asign("updated_at",date('y-m-d h:i:s')); 
       $create->asign("user",$data["txtuser"]); 
       $create->asign("ip",IP());  
       $create->save();
         //echo $create;
    
   // echo "crete";
      Redirect::para("Master","index",array("success"=>"เพิ่มข้อมูลสำเร็จ"));   
    }
    
    public function getDetail(){
         $data = Master::find("SELECT * FROM tbl_data where id='".$_GET["id"]."'");  
         Redirect::view("Master/detail",array("data"=>$data));
    }
    
    public function search(){
       
         $i=0;
         
         $sql = "select * from tbl_data";
         
         
         if(!empty($_GET["iden"])){
             if($i==0){
               $sql .= " where iden like '%".$_GET["iden"]."%'"; 
               $i++;   
             }else{              
               $sql .= " and iden like '%".$_GET["iden"]."%'";
             }             
         }
         
         if(!empty($_GET["fname"])){
             if($i==0){
               $sql.=" where fname_TH like '%".$_GET["fname"]."%'"; 
               $i++;   
             }else{              
                 $sql.=" and fname_TH like '%".$_GET["fname"]."%'"; 
             }             
         }
         
         if(!empty($_GET["lname"])){
             
             if($i==0){
               $sql.=" where lname_TH like '%".$_GET["lname"]."%'"; 
               $i++;   
             }else{              
                 $sql.=" and lname_TH like '%".$_GET["lname"]."%'"; 
             } 
             
         }
         
         if((!empty($_GET["datestart"]))&&(empty($_GET["dateend"]))){
             if($i==0){
               $sql.=" where datestart = '".$_GET["datestart"]."'"; 
               $i++;   
             }else{              
                 $sql.=" and datestart = '".$_GET["datestart"]."'"; 
             }
             
         }else if((empty($_GET["datestart"]))&&(!empty($_GET["dateend"]))){
             
             if($i==0){
               $sql.=" where dateend = '".$_GET["dateend"]."'"; 
               $i++;   
             }else{              
                 $sql.=" and dateend = '".$_GET["dateend"]."'"; 
             }
             
         }else if((!empty($_GET["datestart"]))&&(!empty($_GET["dateend"]))){
              
             if($i==0){
               $sql.=" where created_at between = '".$_GET["datestart"]."' and '".$_GET["dateend"]."'"; 
               $i++;   
             }else{              
                 $sql.=" and created_at between = '".$_GET["datestart"]."' and '".$_GET["dateend"]."'"; 
             }
             
         }

         if(!empty($_GET["type"])){
             if($i==0){
               $sql.=" where type='".$_GET["type"]."'"; 
               $i++;   
             }else{              
                 $sql.=" and type='".$_GET["type"]."'"; 
             }
         }
         
         if($_GET["status"]!=0){
             
              if($i==0){
                $sql.=" where status='".$_GET["status"]."'"; 
               $i++;   
             }else{              
                $sql.=" and status='".$_GET["status"]."'"; 
             }
         }
        
         
         if(Auth::check()==true){
           $lists = Master::all($sql,10,'asc');  
           Redirect::view("Master/index",array("lists"=>$lists,"sql"=>$sql,"links"=> Master::$links));
         }else{
           Redirect::to("auth/login");
         }
         
    }
    
      public function deletes(){
          $delete = new Deletes('tbl_data');
          $delete->where(" id='".$_POST['ids']."'");
          $delete->save();
          
          Redirect::para("Master","index",array("success"=>"ลบข้อมูลสำเร็จ"));
          
      }
      
      public function updatestatus(){
          
           $data=Validation::validate($_POST);
           
           $updates = new Updates('tbl_data');
           $updates->asign("status",$data["status"]);
           $updates->where("id",$data["id"]);  
           $updates->save();
           
           //echo "success";
                      
      }
       
}
?>