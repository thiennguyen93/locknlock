<?php
include './model/product.model.php';
class productController {
    public function home() {
          $model = new productHome();
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