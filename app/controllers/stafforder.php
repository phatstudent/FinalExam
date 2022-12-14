<?php

class Stafforder extends Controller{
    
    function index(){
        $data["page_title"] = "order";

        $order = $this->loadModel("order");

        $result = $order->get_all_orders();
        $data['orders_list'] = $result;

        if(isset($_GET['so_luong_mua'])){

            $_SESSION['product_id'] = $_GET['add_ProductID'];
            $_SESSION['so_luong'] = $_GET['so_luong_mua'];
            // $_SESSION['thanh_tien'] = $_GET['so_luong_mua'];
            show($_SESSION);
        }

        $this->view("pizza/order", $data);
    }

    function xac_nhan_don($orderID=''){
        $data["page_title"] = "order";

        $order = $this->loadModel("order");

        $order->updateOrder($orderID,"DAXACNHAN");
        
        $this->view("pizza/order", $data);
    }
    function tien_hanh_don($orderID=''){
        $data["page_title"] = "order";

        $order = $this->loadModel("order");

        $order->updateOrder($orderID,"TIENHANH");
        
        $this->view("pizza/order", $data);
    }
    function giao_don($orderID=''){
        $data["page_title"] = "order";

        $order = $this->loadModel("order");

        $order->updateOrder($orderID,"DANGGIAO");
        
        $this->view("pizza/order", $data);
    }
    function hoan_tat_don($orderID=''){
        $data["page_title"] = "order";

        $order = $this->loadModel("order");

        $order->updateOrder($orderID,"HOANTAT");
        
        $this->view("pizza/order", $data);
    }

    function huy_don($orderID=''){
        $data["page_title"] = "order";

        $order = $this->loadModel("order");

        $order->updateOrder($orderID,"HUY");
        
        $this->view("pizza/order", $data);
    }

    
    
}
