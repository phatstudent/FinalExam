<?php

class Menu extends Controller{
    
    function index($a = '', $b = '', $c = ''){
        $data["page_title"] = "Menu";

        $product = $this->loadModel("product");

        $result = $product->get_all_products();
        $data['products_list'] = $result;

        $this->view("pizza/menu", $data);
    }
}
