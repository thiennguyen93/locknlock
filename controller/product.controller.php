<?php
include './model/product.model.php';
class controller
{
    public function default(){
        $data = null;

        if (isset($_GET['id'])) { 
        $id = (int) $_GET['id'];        //Lấy ID của sản phẩm truyền từ URL E.g '/product.php?id=5'
        } else {
            
        }
        $model = new default_model();
        $data = $model->getProductInfo($id);
        
        return [
            'view' => 'product_detail',
            'product' => $data
        ];
    }
}
