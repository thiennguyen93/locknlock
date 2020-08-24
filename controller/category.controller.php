<?php
include './model/category.model.php';
include './model/product.model.php';
class controller
{
    public function default(){
         //Lấy category thông qua category model trước
         $model = new category();
         $categoryList = $model->getAllCategories();
        //  var_dump($categoryList);
         //HẾT Lấy category thông qua category model trước
 
         $model = new default_model();
         $page = (int)(isset($_GET['page'])?($_GET['page']>0?$_GET['page']:1):1);
         $itemsPerPage = (int)(isset($_GET['itemsPerPage'])?($_GET['itemsPerPage']>0?$_GET['itemsPerPage']:5):5);
         $filterProductName = isset($_GET['keyword'])?$_GET['keyword']:'';
         $filterCategoryId = isset($_GET['id'])?$_GET['id']:'';
         //tạo link
             $link = '';
             $link .= !empty($filterProductName)?'&keyword='.$filterProductName:'';
             $link .= !empty($filterCategoryId)?'&id                                                        ='.$filterCategoryId:'';
             $link .= !empty($itemsPerPage)?'&itemsPerPage='.$itemsPerPage:'';
 
 
         $productList = $model->getProducts($page,$filterCategoryId,$filterProductName, $itemsPerPage);
         
         $data = [
             'view' => 'category',
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
