<?php

require_once __DIR__."/../Model/ProductModel.php";

class DashboardController{
    public ProductModel $pModel;

    public function __construct(){
        $this->pModel = new ProductModel();
    }

    public function index(){

        $slSanPham = $this->pModel->laySoluongSP();//lay tu database thong qua ProductModel

        require_once __DIR__."/../View/dashboard/dashboard_view.php";
    }
    

}

?>