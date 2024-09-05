<?php 
class OrderController{
    public function getOrders(){
        $orders = Order::getAllOrders();
        return $orders;
    }
    public function addOrder($infos){
        $res = Order::createOrder($infos);
        if($res =="done"){
            foreach($_SESSION as $name => $product){
                if(substr($name,0,9) =="products_"){
                unset($_SESSION[$name]);
                unset($_SESSION['count']);
                unset($_SESSION['totals']);
                }
            }
            Sessions::set("success","order Done !!!");
            Redirect::to("home");
        }
    }
}