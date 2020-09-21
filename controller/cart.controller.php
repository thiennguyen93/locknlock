<?php
include './model/cart.model.php';
include './model/master_data.model.php';
class controller
{
    public function add() {

        $id = isset($_GET['id'])?(int)$_GET['id']:'';
        $quantity = isset($_GET['quantity'])?(int)$_GET['quantity']:1;
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
            $sum = $model->sum_cart();
            $data = [
                'view' => 'cart',
                'cartSession' => $cartSession,
                'sum'=>$sum
            ];
           return $data;
    }

    public function delete() {
        try {
            $id = isset($_GET['id'])?$_GET['id']:'';
            unset($_SESSION['cart'][$id]);
        } catch (Exception $e) {
            echo $e;
        }
        
        

        $result = null;
        $model = new cart_model();
        $cartSession = $model->getCartSession();
        $sum = $model->sum_cart();
        $data = [
            'view' => 'cart',
            'cartSession' => $cartSession,
            'sum'=>$sum
        ];
       return $data;
    }

}
