<?php 
class Category{
    static public function getAll(){
        $stmt = DB::dbCon()->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll();

    }
    static public function getById($id){
        try{ 
            $stmt = DB::dbCon()->prepare('SELECT * FROM categories where category_id=:id');
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            echo "error".$e->getMessage();
        }
       
    }
    static public function add($data){
        $stmt =  DB::dbcon()->prepare("insert into categories (category_name,category_image)
        VALUES (:category_name,:category_image) ");
            $stmt->bindParam(":category_name",$data["category_name"]);
            $stmt->bindParam(":category_image",$data["category_image"]);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
    }
    static public function editCategory($data){
        $stmt = DB::dbcon()->prepare('UPDATE categories SET category_name = :category_name,category_image = :category_image WHERE category_id = :category_id');
        $stmt->bindParam(':category_id', $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':category_name', $data['category_name'], PDO::PARAM_STR);
        $stmt->bindParam(':category_image', $data['category_image'], PDO::PARAM_STR);
       
        if($stmt->execute()){
            return 'ok';
        } else {
            return 'error';
        }
    }
    static public function deletCategory($id){
        try{
            $stmt = DB::dbcon()->prepare("DELETE FROM categories WHERE category_id = :id");
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