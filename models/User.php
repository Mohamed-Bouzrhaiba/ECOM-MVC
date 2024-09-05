<?php
class User{
    
    static public function login($data){
        $username = $data["username"];
        try{
            $stmt = DB::dbcon()->prepare("SELECT * from users where username = :username");
            $stmt->execute([":username"=>$username]);   
            return $user = $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException$ex){
            echo "erroooor".$ex->getMessage();
        }
    }
    
    static public function register($data){
        $stmt =  DB::dbcon()->prepare("insert into users (fullname,username,email,password)
        VALUES (:fullname,:username,:email,:password) ");
            $stmt->bindParam(":fullname",$data["fullname"]);
            $stmt->bindParam(":username",$data["username"]);
            $stmt->bindParam(":password",$data["password"]);
            $stmt->bindParam(":email",$data["email"]);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
        }
        
}