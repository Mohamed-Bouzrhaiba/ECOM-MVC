<?php 


if(isset($_POST['product_id'])){
    $id = $_POST['product_id'];
    $data = new ProductController();
    $product = $data->getProductById();
    
    if($_SESSION["products_".$id]["name"] === $_POST["product_name"]){
        Sessions::set("info","already in cart");
        Redirect::to("cart");
      
    }else{
        if($product->product_qty < $_POST['product_qte']){
        Sessions::set("info","qty not available");
        Redirect::to("cart");
        
    }else{
        $_SESSION['products_'.$product->product_id]= [
            "id"=>$product->product_id,
            "name"=>$product->product_name,
            "price"=>$product->product_price,
            "qte"=>$_POST['product_qte'],
            "total"=>$product->product_price * $_POST['product_qte']
        ];
        $_SESSION['totals'] +=   $_SESSION['products_'.$product->product_id]['total'];
        $_SESSION['count']++;
        Redirect::to("cart");
    }
    }
}


?>
