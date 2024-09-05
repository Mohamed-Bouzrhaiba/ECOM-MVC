<?php
Class DB{
    static public function dbCon(){
        $db = new PDO("mysql:host=localhost;dbname=ECOM-MVC","root","");
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db;
    }
}