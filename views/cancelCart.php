<?php 
$id = $_POST['product_id'];
$price = $_POST['product_price'];
$qte = $_POST['qte'];
$productXqte = $price *$qte;
$data = new ProductController();
$data->emptyCart($id,$productXqte);