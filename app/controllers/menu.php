<?php

class Menu extends Controller{
    
    function index(){
        $data["page_title"] = "Menu";

        $product = $this->loadModel("product");

        $result = $product->get_all_products();
        $data['products_list'] = $result;

        if(isset($_GET['so_luong_mua'])){

            $_SESSION['product_id'] = $_GET['add_ProductID'];
            $_SESSION['so_luong'] = $_GET['so_luong_mua'];
            // $_SESSION['thanh_tien'] = $_GET['so_luong_mua'];
            show($_SESSION);
        }

        $this->view("pizza/menu", $data);
    }
    
}
