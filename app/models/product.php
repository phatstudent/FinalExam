<?php

class Product{

    function get_all_products()
    {

        $querry = 
        'select ProductID, ComboName, Description, Price
        from pizza
        order by ProductID asc ';

        $DB = new Database();

        $data = $DB->read($querry);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    function get_one_product($ProductID)
    {

        $querry = 
        "select ProductID, ComboName, Description, Price
        from pizza
        where ProductID = '$ProductID'
        limit 1 ";

        $DB = new Database();

        $data = $DB->read($querry);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    function add_order($GET)
    {

        $DB = new Database();

        $_SESSION['error'] = "";
        if (isset($GET['order_Ten'])) {

            $arr['CustomerName'] = $GET['order_Ten']; 
            $arr['Phone'] = $GET['order_SDT']; 
            $arr['Address'] = $GET['order_DiaChi']; 
            $arr['CreatedTime'] = date('d-m-y h:i:s'); 
            $arr['Status'] = 'DAKHOITAO'; 
            $arr['ModifiedTime'] = date('d-m-y h:i:s'); 
            $arr['ProductID'] = $GET['order_ProductID']; 
            $arr['Quantity'] = $GET['order_SoLuong']; 
            $arr['Amount'] = $GET['order_ThanhTien']; 
            $arr['Note'] = 'chua co'; 
            $arr['RegisterCode'] = get_random_string_max(10); 
            // $arr["FullName"] = $POST['added_player_FullName'];
            // $arr['ClubID'] = $this->get_ClubID_with_name($POST['added_player_ClubName']); //need to select
            // $arr['Position'] = $POST['added_player_Position'];
            // $arr['Nationality'] = $POST['added_player_Nationality'];
            // $arr['Number'] = $POST['added_player_Number'];

            // show($arr);

            $querry = "insert into `order` (CustomerName,Phone,Address,CreatedTime,Status,ModifiedTime,ProductID,Quantity,Amount,Note,RegisterCode) 
            values (:CustomerName,:Phone,:Address,:CreatedTime,:Status,:ModifiedTime,:ProductID,:Quantity,:Amount,:Note,:RegisterCode)";

            $_SESSION['info'] = $arr;

            $data = $DB->write($querry, $arr);

            if ($data) {
                header("Location:" . ROOT . "order_info");
                die;
            }
        } else {
            $_SESSION['error'] = "sai format";
        }
    }

}