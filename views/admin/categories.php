<?php 
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
$cat = new CategoriesController();
$categories = $cat->getAllCategories();
//var_dump($categories);
}
?>

<div class="container">
    <h2 class="text-center my-4">Manage categories</h2>
    <div class="form-group">
        <a class="btn btn-primary" href="<?=BASE_URL?>addcategory">Add category</a>
    </div>
    <form id="form" action="<?php echo BASE_URL?>updatecategory" method="post">
        <input type="hidden" name="category_id" id="category_id">
    </form>
    <form id="d_form" action="<?php echo BASE_URL?>deleteCategory" method="post">
        <input type="hidden" name="delete_category_id" id="delete_category_id">
    </form>
    <div class="row my-4">
        <div class="col">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th> Name</th>
                        <th>image</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($category['category_name']) ?></td>
                       
                        <td>
                            <img width="50" height="50" src="public/img/<?php echo htmlspecialchars($category['category_image']) ?>" alt="">
                        </td>
                        <td class="d-flex flex-row justify-content-center align-items-center">
                            <a onclick="submitCatEdit(<?php echo $category['category_id'];?>)" class="btn btn-warning btn-sm mr-1">
                                Update
                            </a>
                            <a onclick="deleteCatForm(<?php echo $category['category_id'];?>)" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
