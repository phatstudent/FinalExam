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

}