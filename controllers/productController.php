<?php 
class ProductController{
    public function getAllProducts(){
       return $products = Product::getAllProducts();
    }
    public function getProductByCategory($id){
        if(isset($id)){
            $data = ['id'=>$id];
            return $products = Product::getByCategory($data);
            
        }
    }
    public function getProductById(){
        if(isset($_POST['product_id'])){
            $id = $_POST['product_id'];
            $product = Product::getProduct($id);
            return $product;
        }
    }

    public function emptyCart($id,$productXqte){
        unset($_SESSION['products_'.$id]);
        $_SESSION['count'] -=1;
        $_SESSION['totals'] -= $productXqte;
        Redirect::to("cart");
    }
    public function addNewProduct(){
        
        if(isset($_POST["submit"])){
            $data = [
                "product_name" => $_POST["product_name"],
                "product_description" => $_POST["product_description"],
                "product_price" => $_POST["product_price"],
                "product_qty" => $_POST["product_qty"],
                "product_category_id" => $_POST["product_Cat_id"],
                "product_image" => $this->uploadimg(),
                
            ];
            $res = Product::addNewProduct($data);
            if($res === "ok"){
                Sessions::set("success","Product Added Succefully !");
                Redirect::to("products");
    
            }else{
                echo $res;
            }

        }
    }
    public function uploadimg($oldimg = null){
        $dir = "public/img";
        $time  = time();
        $name = str_replace(' ','-',strtolower($_FILES['product_image']['name']));
        $type = $_FILES['product_image']['type'];
        $extension = substr($name, strpos($name, '.'));
        $extension = str_replace('.', '', $extension);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
        $fimage = $name . '-' . $time . '.' . $extension;
        if(move_uploaded_file($_FILES["product_image"]["tmp_name"], $dir . "/" . $fimage)){
            return $fimage;
        }
       
        return $oldimg;
    }

    public function updateProduct(){
        if(isset($_POST["submit"])){
            $oldimg = $_POST["product_current_image"];
            $data = array(
                "product_id" => $_POST["product_id"],
                "product_name" => $_POST["product_name"],
                "product_description" => $_POST["product_description"],
                "product_qty" => $_POST["product_qty"],
                "product_image" => $this->uploadimg($oldimg),
                "product_price" => $_POST["product_price"],
                "product_category_id" => $_POST["product_Cat_id"], 
            );
            $res = Product::editProduct($data);
            if($res === "ok"){
                Sessions::set("success","modified product");
                Redirect::to("products");
            } else {
                echo $res;
            }
        }
    }

    public function deleteProduct(){
        if(isset($_POST['delete_product_id'])){
            $id = $_POST['delete_product_id'];
            $res = Product::deleteProduct($id);
            if($res === "done"){
                Sessions::set("success","done");
                Redirect::to("products");
    
            }else{
                echo $res;
            }
        }
    }
}