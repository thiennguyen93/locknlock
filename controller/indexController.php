<?php
include './model/m_products_by_category.php';
class indexController {
    public function home() {
        $model = new sanpham();
        $pageNum = (int)@$_GET['page'];
        $keyword = addslashes(@$_GET['keyword']);
        $sl = 3;
        $total = $model->totalData();
        $data = $model->page($pageNum, $sl, $keyword);
        $totalPage = ceil($total['total']/$sl);
        return [
            'view' => 'index',
            'data' => $data,
            'totalPage' => $totalPage
        ];
    }
}