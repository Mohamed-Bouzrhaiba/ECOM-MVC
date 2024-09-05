<?php 
class Product{
    static public function getAllProducts(){
        $stmt = DB::dbCon()->prepare('SELECT * FROM products');
        $stmt->execute();
        return $stmt->fetchAll();

    }
    static public function getByCategory($data){

        $id = $data['id'];
        try{
            $stmt = DB::dbCon()->prepare('SELECT * FROM products where product_category_id =  :id');
            $stmt->execute([':id'=>$id]);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo "error". $e->getMessage();
        }
    }

    static public function getProduct($id){
      
        try{
            $stmt = DB::dbCon()->prepare('SELECT * FROM products where product_id =  :id');
            $stmt->execute([':id'=>$id]);
            return $product = $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo "error". $e->getMessage();
        }
    }

    static public function addNewProduct($data){
        $stmt =  DB::dbcon()->prepare("insert into products (product_name,product_price,product_qty,description,product_category_id,product_image)
        VALUES (:product_name,:product_price,:product_qty,:description,:product_category_id,:product_image) ");
            $stmt->bindParam(":product_name",$data["product_name"]);
            $stmt->bindParam(":product_price",$data["product_price"]);
            $stmt->bindParam(":product_qty",$data["product_qty"]);
            $stmt->bindParam(":description",$data["product_description"]);
            $stmt->bindParam(":product_category_id",$data["product_category_id"]);
            $stmt->bindParam(":product_image",$data["product_image"]);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
    }
    static public function editProduct($data){
        $stmt = DB::dbcon()->prepare('UPDATE products SET 
                product_name = :product_name,
                description = :description,
                product_qty = :product_qty,
                product_image = :product_image,
                product_price = :product_price,
                product_category_id = :product_category_id
                WHERE product_id = :product_id
        ');
        $stmt->bindParam(':product_id', $data['product_id']);
        $stmt->bindParam(':product_name', $data['product_name']);
        $stmt->bindParam(':description', $data['product_description']);
        $stmt->bindParam(':product_qty', $data['product_qty']);
        $stmt->bindParam(':product_image', $data['product_image']);
        $stmt->bindParam(':product_price', $data['product_price']);
        $stmt->bindParam(':product_category_id', $data['product_category_id']);
    
        if($stmt->execute()){
            return 'ok';
        } else {
            return 'error';
        }
    }
    static public function deleteProduct($id){
        try{
            $stmt = DB::dbcon()->prepare("DELETE FROM products WHERE product_id = :id");
            $stmt->execute([":id"=>$id]);
            
        if($stmt->execute()){
            return 'done';
        } else {
            return 'error';
        }
        }catch(PDOException $ex){
            echo "error.." .$ex->getMessage();
        }
    }
}