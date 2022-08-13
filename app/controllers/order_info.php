<?php

class order_info extends Controller{
    
    function index(){
        $data["page_title"] = "order info";

        $data['order_info'] = $_SESSION['info'];


        $this->view("pizza/order_info", $data);
    }
    
}
