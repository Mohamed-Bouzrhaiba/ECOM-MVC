<?php 
class Order{
   
    static public function getAllOrders(){
        $stmt = DB::dbcon()->prepare("SELECT* from orders");
        $stmt->execute();
        return $stmt->fetchAll();
    
}
    static public function createOrder($infos){
        $stmt =  DB::dbcon()->prepare("insert into orders (name,product,qty,price,total)
                            VALUES (:name,:product,:price,:qty,:total) ");
        $stmt->bindParam(":name",$infos["name"]);
        $stmt->bindParam(":product",$infos["product"]);
        $stmt->bindParam(":price",$infos["price"]);
        $stmt->bindParam(":qty",$infos["qty"]);
        $stmt->bindParam(":total",$infos["total"]);
        if (empty($infos["name"])) {
            return "error..!";
        }
        if($stmt->execute()){
            return "done";
        }else{
            return "error..!";
        }
    }
}