<?php
class CategoriesController{
    public function getAllCategories(){
        return $categories =Category::getAll();

    }
    public function getCategoryById(){
        if(isset($_POST['category_id'])){
            $id = $_POST['category_id'];
            return $category = Category::getById($id);

        }
    }
    public function addNewCategory(){
        if(isset($_POST['submit'])){
            $data =[
                "category_name"=>$_POST["category_name"],
                "category_image"=>$this->uploadimg()
            ];
            $res  = Category::add($data);
            if($res){
                Sessions::set('success','added succeffully..!');
                Redirect::to("categories");

            }else{
                echo $res;
            }
           
        }
    }
    public function updateCategory(){
        if(isset($_POST["submit"])){
          
            $oldimg = $_POST["category_current_image"];
            $data = array(
                "category_id" => (int)$_POST["category_id"],
                "category_name" => $_POST["category_name"],
                "category_image" => $this->uploadimg($oldimg)
            );
          
            $res = Category::editCategory($data);
            if($res === "ok"){
                Sessions::set("success","modified category");
                Redirect::to("categories");
            } else {
                echo $res;
            }
        }
    }
    public function uploadimg($oldimg = null){
        $dir = "public/img";
        $time  = time();
        $name = str_replace(' ','-',strtolower($_FILES['category_image']['name']));
        $type = $_FILES['category_image']['type'];
        $extension = substr($name, strpos($name, '.'));
        $extension = str_replace('.', '', $extension);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
        $fimage = $name . '-' . $time . '.' . $extension;
        if(move_uploaded_file($_FILES["category_image"]["tmp_name"], $dir . "/" . $fimage)){
            return $fimage;
        }
       
        return $oldimg;
    }
    public function deleteCategory(){
        if(isset($_POST['delete_category_id'])){
            $id = $_POST['delete_category_id'];
            $res = Category::deletCategory($id);
            if($res === "done"){
                Sessions::set("success","done");
                Redirect::to("categories");
    
            }else{
                echo $res;
            }
        }
    }
        
}