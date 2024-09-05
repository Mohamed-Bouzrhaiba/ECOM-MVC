<?php  
$var  = new CategoriesController();
$categories = $var->getAllCategories();

if(isset($_POST['category_id'])){
    $productByCategory= new ProductController();
    $products = $productByCategory->getProductByCategory($_POST['category_id']);
}else{
    $data = new ProductController();
    $products = $data->getAllProducts();
}
?>
 


<div class="container my-5">
 <div class="banner">
        <div class="banner-content">
            <h1>Explore the Latest Football Jerseys Collection</h1>
            <p>Find your favorite team's jersey and show your support!</p>
            <a href="#shop">Shop Now</a>
        </div>
        <img src="./public/img/banner.jpg" alt="Football Jerseys" />
    </div>
    <h3 class="text-secondary m-3 text-center">
        <span class="highlight-text">Shop Your Favourite League
</span>
    </h3>

    <div class="row mt-5">
    <?php foreach($categories as $category): ?>
        <div class="col-md-3 mb-3">
                <div class="card category-card">
                    <form method="POST" id="product_category_form" action="<?=BASE_URL?>">
                        <input type="hidden" id="category_id" name="category_id">
                    </form>
                <a onclick="getProductCategory(<?=$category['category_id']?>)"> <img class="card-img-top" src="public/img/<?php echo htmlspecialchars($category['category_image']) ?>" style="width: 80px; height: 80px;" alt="Card image cap">
                    <div class="card-body">
                    </div>
                    </a>   
                </div>
            </div>
        <?php endforeach ;?>
        
    </div>
    <div class="row mt-3">
        <?php if (count($products) > 0) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="col-md-3 mb-2">
                    <div class="card h-100 bg-light rounded p-2">
                        <form id="form" method="POST" action="<?=BASE_URL?>show">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['product_id']; ?>">
                        </form>
                        <div  onclick="submitForm(<?php echo $product['product_id']; ?>)"  class="card-img-top">
                            <img src="public/img/<?= $product['product_image'] ?>" alt="" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h4 class="card-text">
                                <?php echo $product['product_name']; ?>
                            </h4>
                            <p class="card-text">
                                <?php echo $product['description']; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            
                           <H5>  <?php echo $product['product_price']; ?> $</H5>  
                     
                           
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <div class="alert alert-info">
                    No products available in this category.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>