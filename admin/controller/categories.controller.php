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
}