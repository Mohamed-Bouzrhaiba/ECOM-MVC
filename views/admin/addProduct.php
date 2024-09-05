<?php 
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
    $categories = new CategoriesController();
    $categories =$categories->getAllCategories();
if(isset($_POST['submit'])){
    $newProduct = new productController();
    $newProduct->addNewProduct();
}
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product </h4>
                </div>
                <div class="card-body">
                    <form  method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="product_name" placeholder="enter product name" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="product_description" placeholder="enter description " class="form-control" >
                        </div>
                     
                        <div class="form-group">
                            <input type="text" name="product_price" placeholder="enter price" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="number" name="product_qty" placeholder="enter quantity" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="file" name="product_image"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <select class="form-group" name="product_Cat_id" id="">
                                <option value="" selected>CHOSE CATEGORY</option>
                                <?php foreach($categories as $cat):?>
                                    <option value="<?=$cat['category_id']?>"><?=$cat['category_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>