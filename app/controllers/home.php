<?php

class Home extends Controller{
    
    function index($a = '', $b = '', $c = ''){
        $data["page_title"] = "home";

        $this->view("pizza/index", $data);
    }
}
