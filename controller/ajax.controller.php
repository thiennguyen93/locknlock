<?php
include './model/ajax.model.php';
class ajaxcontroller {
    public function check() {
          $model = new default_model();
          $result =$model->checkUsernameAvailable($_GET['username']);
          return $result;
    }
}