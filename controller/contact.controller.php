<?php
include './model/contact.model.php';
class controller {
    public function default() {
        if (!isset($_POST)) {
            
        }
          return [
              'view' => 'contact'
          ];
    }
}