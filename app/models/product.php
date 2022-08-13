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

}