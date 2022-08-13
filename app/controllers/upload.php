<?php

class Upload extends Controller{

    function index($a = '', $b = '', $c = ''){

        // $data["page_title"] = "upload";
        // $this->view("minima/upload", $data);

        header(('location:'.ROOT."upload/image"));
        die;
    }

    function image($a = '', $b = '', $c = ''){
        
        $user = $this->loadModel("user");
        if(!$result = $user->check_logged_in()){
            header("Location:". ROOT . "login");
            die;
        }

        $data["page_title"] = "upload";
        $this->view("minima/upload", $data);
    }
}