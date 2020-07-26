<?php
include './model/categories.model.php';
class controller {
    public function default() {
        $model = new default_model();
        $allCategories = $model->getAllCategories();
        $data = [
            'view' => 'categories',
            'allCategories' => $allCategories
        ];
          return $data;
    }

    public function edit() {
        //Tương ứng với action=edit
        $model = new default_model();
        $category = $model->getCategory($_GET['id']);
        $allCategories = $model->getAllCategories();
        //Nếu không tìm thấy danh mục
        if (!$category) {
            $data = [
                'view' => 'error',
                'errDetail' => 'Không tìm thấy Danh mục',
                'errReturnLink' => 'categories.php'
            ];
        } else {
            //Lấy thông tin danh mục cha nếu có 
            $data = [
                'view' => 'layout/category-edit.layout',
                'category' => $category,
                'allCategories'=>$allCategories
            ];
        };
        return $data;
    }
}