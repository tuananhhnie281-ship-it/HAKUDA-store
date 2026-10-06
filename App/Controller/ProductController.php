<?php
class ProductController{

    public function __contruct(){

    }

    public function index(){
        require_once __DIR__."/../View/product/product_view.php";
    }
    
    public function create(){
        require_once __DIR__."/../View/product/product_create.php";
    }

}

?>