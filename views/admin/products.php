<?php 
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){

$data = new productController();
$products = $data->getAllProducts();
}
?>
<div class="container">
    <h2 class="text-center my-4">Manage Products</h2>
    <div class="form-group">
        <a class="btn btn-primary" href="<?=BASE_URL?>addProduct">Add Product</a>
    </div>
    <form id="form" action="<?php echo BASE_URL?>updateProduct" method="post">
        <input type="hidden" name="product_id" id="product_id">
    </form>
    <form id="d_form" action="<?php echo BASE_URL?>deleteProduct" method="post">
        <input type="hidden" name="delete_product_id" id="delete_product_id">
    </form>
    <div class="row my-4">
        <div class="col">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['product_name']) ?></td>
                        <td><?php echo htmlspecialchars($product['description']) ?></td>
                        <td><?php echo htmlspecialchars($product['product_price']) ?>$</td>
                        <td><?php echo htmlspecialchars($product['product_qty']) ?></td>
                        <td>
                            <img width="50" height="50" src="public/img/<?php echo htmlspecialchars($product['product_image']) ?>" alt="">
                        </td>
                        <td class="d-flex flex-row justify-content-center align-items-center">
                            <a onclick="submitForm(<?php echo $product['product_id'];?>)" class="btn btn-warning btn-sm mr-1">
                                Update
                            </a>
                            <a onclick="deleteForm(<?php echo $product['product_id'];?>)" class="btn btn-danger btn-sm">
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
