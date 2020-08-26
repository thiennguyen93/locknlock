<?php
include './model/order.model.php';
include './model/master_data.model.php';
// include './model/product.model.php';
class controller
{
    public function addToCart($id, $quantity=1) {
        $model = new default_model();
        if (isset($_SESSION['user_info'])) {
            //Nếu user đã đăng nhập thì load tất cả các đơn hàng của user
        }
    }


    public function default(){
        $model = new default_model();
        $orders = [];
        if (isset($_SESSION['user_info'])) {
            //Nếu user đã đăng nhập thì load tất cả các đơn hàng của user
            $orders = $model->getAllOrdersByUserID($_SESSION['user_info']['id']);
        }
        var_dump($orders);
        $data = [
            'view'=> 'order',
            'orders'=> $orders
        ];
        return $data;
    }
}
