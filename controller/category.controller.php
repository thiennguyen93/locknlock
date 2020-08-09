<?php
include './model/category.model.php';
class controller
{
    public function default(){
        $data = null;

        $id = isset($_GET['id'])?(int)$_GET['id']:0;
        $model = new category();
        $data = $model->getProductsByCategoryId($id);
        var_dump($data);
        exit();
        return [
            'view' => 'category',
            'product' => $data
        ];
    }
}
