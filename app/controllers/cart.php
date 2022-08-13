<?php

class Cart extends Controller{
    
    function index($a = '', $b = '', $c = ''){
        $data["page_title"] = "Cart";

        $product = $this->loadModel("product");

        if(isset($_SESSION['product_id'])){
            show($_SESSION);
            $result = $product->get_one_product($_SESSION['product_id']);
            $data['products_list'] = $result[0];
        }

        $this->view("pizza/cart", $data);
    }
}
