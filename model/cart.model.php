<?php 

class cart_model {
    private $db;
    function __construct()
    {
        $this->db = new database();
    }

    function getCartSession() {

        if (!isset($_SESSION['cart'])){
            $result = $_SESSION['cart'];
        } else {
            $result = null;
        }
        return $result;
    }
    

    
}
