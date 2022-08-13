<?php

class Cart extends Controller{
    
    function index($a = '', $b = '', $c = ''){
        $data["page_title"] = "Cart";

        $product = $this->loadModel("product");

        if(isset($_SESSION['product_id'])){
            // show($_SESSION);
            $result = $product->get_one_product($_SESSION['product_id']);
            $data['products_list'] = $result[0];
            $data['thanh_tien'] = $_SESSION['so_luong'] * $data['products_list']->Price;
        }

        if(isset($_GET['order_Ten'])){
            // show($_GET);
            $product->add_order($_GET);
        }

        $this->view("pizza/cart", $data);
    }
}
