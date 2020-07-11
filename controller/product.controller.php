<?php
include './model/product.model.php';
class controller
{
    public function default(){
        $data = null;
        $id = (int) $_GET['id'];        //Lấy ID của sản phẩm truyền từ URL E.g '/product.php?id=5'
        $model = new default_model();
        $data = $model->getProductInfo($id);
        var_dump($data);
        return [
            'view' => 'product_detail',
            'data' => $data
        ];
    }
}
