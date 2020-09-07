<?php
include './model/price.model.php';
class controller {
    public function default() {
        $data = [
            'view' => 'price'
        ];
        if (!isset($_POST)) {
            // $name 
        }
          return $data;
    }
}