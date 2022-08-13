<?php

class order{

    function get_all_orders()
    {

        $querry = "select * from `order`";

        $DB = new Database();

        $data = $DB->read($querry);
        if (is_array($data)) {

            return $data;
        }

        return false;
    }

    function updateOrder($orderID, $status)
    {
        
        $querry = "UPDATE `order`
        SET Status = '$status'
        WHERE OrderID = '$orderID'";

        $DB = new Database();

        $data = $DB->write($querry);
        if ($data) {

            header("Location:". ROOT . "stafforder");
        }

        return false;
    }

}