<?php
include './model/products.model.php';
class controller {
    public function default() {
        $model = new default_model();
        $data = [
            'view' => 'products'
        ];
          return $data;
    }

}