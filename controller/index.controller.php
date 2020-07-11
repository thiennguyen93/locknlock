<?php
include './model/product.model.php';
class controller {
    public function default() {
          $model = new default_model();
          $data = $model->getCategoryFrontPage();
          $catOnFrontPage = array();

          foreach ($data as $key => $item) { 
              $productInCat = $model->getProductInCategory($item['id']); 
              $catOnFrontPage[$item['id']]['product'] =  $productInCat;
              $catOnFrontPage[$item['id']]['cat'] = $item;
          }

          return [
              'view' => 'index',
              'data' => $catOnFrontPage
          ];
    }
}