<?php
include './model/products.model.php';
include './model/categories.model.php';
class controller {
    public function default() {
        //Lấy category thông qua category model trước
        $model = new category_model();
        $categoryList = $model->getAllCategories();
        //HẾT Lấy category thông qua category model trước

        $model = new default_model();
        $page = (int)(isset($_GET['page'])?($_GET['page']>0?$_GET['page']:1):1);
        $itemsPerPage = (int)(isset($_GET['itemsPerPage'])?($_GET['itemsPerPage']>0?$_GET['itemsPerPage']:5):5);
        $filterProductName = isset($_GET['keyword'])?$_GET['keyword']:'';
        $filterCategoryId = isset($_GET['categoryId'])?$_GET['categoryId']:'';

        //tạo link
            $link = '';
            $link .= !empty($filterProductName)?'&keyword='.$filterProductName:'';
            $link .= !empty($filterCategoryId)?'&categoryId='.$filterCategoryId:'';
        


        $productList = $model->getProducts($page,$filterCategoryId,$filterProductName);
        $data = [
            'view' => 'products',
            'productList' => $productList['products'],
            'totalPages' =>  $productList['totalPages'],
            'page' => $page,
            'itemPerPage' => $itemsPerPage,
            'categoryList' => $categoryList,
            'link' => $link
        ];
          return $data;
    }

}