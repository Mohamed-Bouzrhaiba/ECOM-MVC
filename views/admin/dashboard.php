<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div id="sidebar" class="col-md-3 col-lg-2 bg-dark text-white p-3">
            <div class="user-info text-center mb-4">
                <h4>👨🏻‍💻<?=$_SESSION['fullname']?> </h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="<?=BASE_URL?>products">
                        🛒 Manage Products

                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="<?=BASE_URL?>categories">
                        📂 Manage Categories
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-white" href="<?=BASE_URL?>orders">
                        📦 View Orders
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div id="main-content" class="col-md-9 col-lg-10 p-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">🛒 Total Products</h5>
                            <p class="card-text" style="font-size: 24px;">

                                <?php 
                                    $data  = new ProductController();
                                    $products = $data->getAllProducts();
                                    echo count($products); 
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">📂 Total Categories</h5>
                            <p class="card-text" style="font-size: 24px;">
                            <?php 
                                    $data  = new CategoriesController();
                                    $categories = $data->getAllCategories();
                                    echo count($categories); 
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">📦 Total Orders</h5>
                            <p class="card-text" style="font-size: 24px;">
                            <?php 
                                    $data  = new OrderController();
                                    $orders = $data->getOrders();
                                    echo count($orders); 
                                ?> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

