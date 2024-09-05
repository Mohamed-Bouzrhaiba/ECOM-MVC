<?php 
$order = new OrderController();
foreach ($_SESSION as $name => $product) {
    if (substr($name, 0, 9) == "products_") {
        $infos = [
            "name" => $_SESSION["fullname"],
            "product" => $product["name"],
            "qty" => $product["qte"],
            "price" => $product["price"],
            "total" => $product["total"],
        ];
        $order->addOrder($infos);
    }else{
        Redirect::to("home");
    }
}
