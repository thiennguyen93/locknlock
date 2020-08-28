<?php
include './model/cart.model.php';
include './model/master_data.model.php';
class controller
{
    public function addToCart() {

        $id = isset($_GET['id'])?(int)$_GET['id']:'';
        $quantity = isset($quantity)?(int)$quantity:1;
        $model = new cart_model();
        if ($model->addCartSession($id,$quantity)) {
            //Thêm sản phẩm vào cart thành công
            header('Location: cart.php');
            exit();
        };
        
        $data = [
            'view' => 'cart'
        ];
        return $data;
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
