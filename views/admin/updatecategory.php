<?php 
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
    $oldCat = new CategoriesController();
    $oldCategory = $oldCat->getCategoryById();
   // var_dump($oldCategory);

    if(isset($_POST['submit'])){
        $newCat = new CategoriesController();
        $newCat->updateCategory();
    }
}
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Update Category</h4>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input value="<?=htmlspecialchars($oldCategory->category_name)?>" 
                                   type="text" 
                                   name="category_name"  
                                   class="form-control" 
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="category_image">Current Image</label>
                            <img src="./public/img/<?=$oldCategory->category_image?>" 
                                 width="100px" height="100px" alt="Current Image">
                        </div>

                        <div class="form-group">
                            <label for="category_image">Upload New Image</label>
                            <input type="file" name="category_image" class="form-control">
                        </div>

                        <input type="hidden" name="category_id" value="<?=htmlspecialchars($oldCategory->category_id);?>">
                        <input type="hidden" name="category_current_image" value="<?=htmlspecialchars($oldCategory->category_image);?>">

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
