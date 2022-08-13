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

}