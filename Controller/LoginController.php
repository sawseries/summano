<?php

require_once './app/BaseController.php';

class LoginController extends BaseController {

    
    public static function auth(){
         
        $data=Validation::validate($_POST);
         
        $check = Master::first("select * from users where username='".$data['username']."' and password='".sha1($data['password'])."'");

        if(isset($check)) {

            if(count($check)>1){
           
            $data = new Auth();
            $data->set("auth",true);
            $data->set("username",$check["username"]);
            $data->set("fullname",$check["fname"]." ".$check["lname"]);
            $data->set("status",$check["status"]);         
            
            Redirect::url("Master","index");              
        }else{
            Redirect::view("auth/login",array("fail"=>"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง"));
        }
        
        }else{
           Redirect::view("auth/login",array("fail"=>"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง"));
        }
    }
    
      public static function register(){          
        
        $data= Validation::validate($_POST);
        
           $create = new Insert("users");
           $create->asign("username",$data["username"]);
           $create->asign("password",sha1($data["password"]));
           $create->asign("fname",$data["fname"]);
           $create->asign("lname",$data["lname"]);
           $create->asign("position",$data["position"]); 
           $create->asign("status",'admin'); 
           $create->asign("email",$data["email"]);  
           $create->asign("created_at",date('y-m-d h:i:s'));  
           $create->asign("updated_at",date('y-m-d h:i:s')); 
           $create->asign("ip",IP());  
           $create->save();
//        $register = eloquent::insert("users",
//         array("username"=>$data["username"],
//             "password"=> sha1($data["password"]),
//             "fname"=>$data["fname"],
//             "lname"=>$data["lname"],
//             "position"=>$data["position"],
//             "status"=>'admin',
//             "email"=>$data["email"],
//             "created_at"=>date('y-m-d h:i:s'),
//             "updated_at"=>date('y-m-d h:i:s'),
//             "ip"=> IP(),
//             "email"=>$data["email"]));
        
          Redirect::view("auth/login",array("success"=>"ลงทะเบียนสำเร็จ"));
          
      }
      
    
      public static function getregister(){
           Redirect::to("auth/register");
      }          
    
      public static function logout(){          
          
           Auth::destroy(); 
           Redirect::url("Master","index");
      }
    
}
