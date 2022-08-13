<?php

class User{
    function login($POST){

        $DB = new Database();


        $_SESSION['error'] ="";
        if(isset($POST['username']) && isset($POST['password'])){
            $arr['UserName'] = $POST['username'];
            $arr['Password'] = $POST['password'];
            $querry = "select * from account where UserName = :UserName && Password = :Password limit 1";

            $data = $DB->read($querry, $arr);
            
            if(is_array($data)){
                //logged in
                $_SESSION['user_name'] = $data[0]->UserName;
                $_SESSION['AccountType'] = $data[0]->AccountType;
                $_SESSION['Status'] = $data[0]->Status;
                header("Location:". ROOT);
                die;
            }else{
                $_SESSION['error'] = "wrong username or password";
            }
        }else{
            $_SESSION['error'] = "please enter a valid username and password";
        }
    }

    function signup($POST){
        
        $DB = new Database();

        $_SESSION['error'] ="";
        if(isset($POST['username']) && isset($POST['password'])){

            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $arr['email'] = $POST['email'];
            $arr['url_address'] = get_random_string_max(50);
            $arr['date'] = date("Y-m-d H:i:s");

            $querry = "insert into users (username,password,email,url_address,date) values (:username,:password,:email,:url_address,:date)";

            $data = $DB->write($querry, $arr);
            echo $data;
            if($data){
                header("Location:". ROOT . "login");
                die;
            }

        }else{
            $_SESSION['error'] = "please enter a valid username and password";
        }
    }

    function check_logged_in(){

        $DB = new Database();

        if(isset($_SESSION['user_url'])){

            $arr['UserName'] = $_SESSION['user_name'];

            $querry = "select * from account where UserName = :UserName limit 1";
            $data = $DB->read($querry, $arr);
            if(is_array($data)){
                //logged in
                $_SESSION['user_name'] = $data[0]->UserName;

                return true;
            }
        }

        return false;

    }

    function logout(){

        unset($_SESSION['user_name']);
        unset($_SESSION['user_url']);

        header("Location:". ROOT ."login");
    }

}