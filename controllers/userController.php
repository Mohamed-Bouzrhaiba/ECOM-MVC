<?php 
class UserController{


public function auth(){
        if(isset($_POST["username"])){
            $data["username"] = $_POST["username"];
            $res = User::login($data);
            if($res->username === $_POST["username"] && password_verify($_POST["password"],$res->password)){
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $res->username;
                $_SESSION["fullname"] = $res->fullname;
                $_SESSION["admin"] = $res->admin;
                if( $_SESSION["admin"] == true){
                    Sessions::set("success","Logged successfully..!");
                    Redirect::to("dashboard");  
                }else{   
                    Sessions::set("success","Logged successfully..!");
                    Redirect::to("home");
                }
             
            }else{
                Sessions::set("danger","user name or password is not correct");
                Redirect::to("login");
            }
        }
    }
    public function register(){
        $options = ["cost" => 12];
        $password = password_hash($_POST["password"],PASSWORD_BCRYPT,$options);
        $data = [
            "fullname" => $_POST["fullname"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $password,
        ];
        $res = User::register($data);
        if($res === "ok"){
            Sessions::set("success","your account is created succefully..!");
            Redirect::to("login");

        }else{
            echo $res;
        }

    }
public function logout(){
    session_destroy();
}


}