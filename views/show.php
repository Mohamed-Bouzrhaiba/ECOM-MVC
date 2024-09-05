<?php
    $data = new productController();
    $product = $data->getProductById();

?>

<style>
        body {
            background-color: #f8f9fa;
        }

        .product-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .product-image {
            flex: 1;
            margin-right: 20px;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-details {
            flex: 2;
        }

        .product-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 20px;
            color: #e44d26;
            margin-bottom: 10px;
        }

        .old-price {
            color: #6c757d;
            text-decoration: line-through;
            margin-right: 10px;
        }

        .add-to-cart-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="product-container">
    <div class="product-image">
        <img src="public/img/<?=$product->product_image?>" alt="<?php echo $product->product_name; ?>">
    </div>
    <div class="product-details">
        <h2 class="product-title"><?php echo $product->product_name; ?></h2>
        <p class="product-description"><?php echo $product->description; ?></p>
        <p class="product-price">
            
        <?php echo $product->product_price; ?>$
        </p>
        <form method="post" action="<?php echo BASE_URL; ?>checkout">
            <div class="form-group">
                <label for="product_qte">Qté :</label>
                <input type="number" name="product_qte" id="product_qte" class="form-control" value="1">
                <input type="hidden" name="product_name" value="<?php echo $product->product_name; ?>">
                <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
            </div>
            <button type="submit" class="add-to-cart-btn">Add To Cart</button>
        </form>
    </div>
</div>
