<?php 
include_once './autoload.php';
include_once './views/includes/header.php';
include_once './views/includes/footer.php';
$home = new homeController();


$pages =['home','dashboard','addProduct','updateProduct','deleteProduct','show','checkout',
        'emptyCart','cart','cancelCart','register','login','logout','orders','products','addOrder','categories','addcategory','updatecategory','deleteCategory'];

if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
        if($page === 'dashboard'||$page === 'addProduct'||$page === 'updateProduct'||$page === 'deleteProduct'||$page === 'orders' ||$page === 'products'||$page==='categories'||$page==='addcategory' ||$page==='updatecategory'|| $page === 'deleteCategory'){
            if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
                $admin = new adminController();
                $admin->index($page);
            }else{
                include('views/includes/404.php');
            }
        }else{
            $home->index($page);
        }
    }else{
        include('views/includes/404.php');
    }
}else{
    $home->index('home');
}