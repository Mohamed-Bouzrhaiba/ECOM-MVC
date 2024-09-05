<?php

Class adminController{
     public function index($page){
        include('./views/admin/'.$page.'.php');
    }
}