<?php
include './model/cart.model.php';
include './model/product.model.php';
class controller
{
    public function addToCart($id, $quantity=1) {
        $model = new default_model();
        if (isset($_SESSION['user_info'])) {
            //Nếu user đã đăng nhập
        }
    }


    public function default(){
            $data = [];
            //Nếu user đã đăng nhập thì load tât
           return $data;
    }
}
