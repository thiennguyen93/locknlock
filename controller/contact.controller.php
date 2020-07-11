<?php
include './model/contact.model.php';
class controller {
    public function default() {
        $data = [
            'view' => 'contact'
        ];
        if (!isset($_POST)) {
            // $name 
        }
          return $data;
    }
}