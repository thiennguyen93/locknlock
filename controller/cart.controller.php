<?php
include './model/cart.model.php';
include './model/master_data.model.php';
class controller
{
    public function addToCart($id, $quantity=1) {
        $model = new default_model();
        if (isset($_SESSION['user_info'])) {
            //Nếu user đã đăng nhập
        }
    }


    public function default(){
            $result = null;
            $model = new cart_model();
            $cartSession = $model->getCartSession();
            
            $data = [
                'view' => 'cart',
                'cartSession' => $cartSession
            ];

           return $data;
    }
}
