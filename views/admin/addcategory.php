<?php 
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
    if(isset($_POST['submit'])){
    $newCat = new CategoriesController();
    $newCat->addNewCategory();
}
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category </h4>
                </div>
                <div class="card-body">
                    <form  method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="category_name" placeholder="enter categoryname" class="form-control" >
                        </div>
                        
                     
                        <div class="form-group">
                            <input type="file" name="category_image"  class="form-control" >
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