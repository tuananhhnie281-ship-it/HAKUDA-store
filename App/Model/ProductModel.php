<?php

require_once __DIR__."/../Database.php";

class ProductModel{
    private Database $database;


    public function __contruct(){
        $this->database = new Database();
    }   

    public function laySoluongSP(){
        //sql select All
        // $sql = "COUNT....";
        // $this->datase->pdo->prepare();


        return 155;
    }



}