<?php
include './model/product.model.php';
class controller
{
    public function
    default()
    {
        $id = (int) $_GET['id'];
        $model = new default_model();
        $data = $model->getCategoryFrontPage();
        $catOnFrontPage = array();
        return [
            'view' => 'product_detail',
            'data' => $catOnFrontPage
        ];
    }
}
