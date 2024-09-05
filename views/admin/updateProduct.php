<?php 
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
    $categories = new CategoriesController();
    $categories =$categories->getAllCategories(); 
    $oldProduct = new productController();
    $oldProduct = $oldProduct->getProductById();
    //var_dump($oldProduct);
if(isset($_POST['submit'])){
    $newProduct = new productController();
    $newProduct->updateProduct();
}
}

?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Update Product </h4>
                </div>
                <div class="card-body">
                    <form  method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input value="<?=$oldProduct->product_name?>" type="text" name="product_name" placeholder="enter product name" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <input value="<?=$oldProduct->description?>" type="text" name="product_description" placeholder="enter description " class="form-control" >
                        </div>

                        <div class="form-group">
                            <input value="<?=$oldProduct->product_price?>" type="text" name="product_price" placeholder="enter price" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input value="<?=$oldProduct->product_qty?>" type="number" name="product_qty" placeholder="enter quantity" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input src="./public/img/<?=$oldProduct->product_image?>" width="100px" height="100px" type="file" name="product_image"  class="form-control" >
                        </div>
                        <input type="hidden"
                            name="product_id" 
                            value="<?php echo $oldProduct->product_id;?>">
                        <input type="hidden" name="product_current_image" 
                            value="<?php echo $oldProduct->product_image;?>">
                        <div class="form-group">
                           <!-- Assuming $oldProduct->product_category_id is the ID of the current category -->
                                            <select class="form-group" name="product_Cat_id" id="">
                                                <option value="" <?php echo ($oldProduct->product_category_id == '') ? 'selected' : ''; ?>>CHOOSE CATEGORY</option>
                                                <?php foreach ($categories as $cat): ?>
                                                    <option value="<?=$cat['category_id']?>" <?php echo ($oldProduct->product_category_id == $cat['category_id']) ? 'selected' : ''; ?>>
                                                        <?=$cat['category_name']?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn-primary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>