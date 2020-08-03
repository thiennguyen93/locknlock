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
        $itemsPerPage = (int)(isset($_GET['itemsPerPage'])?($_GET['itemsPerPage']>0?$_GET['itemsPerPage']:3):3);
        $itemsPerPage = $itemsPerPage > 10?10:$itemsPerPage;
        $filterProductName = isset($_GET['keyword'])?$_GET['keyword']:'';
        $filterCategoryId = isset($_GET['categoryId'])?$_GET['categoryId']:'';
        $filterProductId = isset($_GET['id'])?$_GET['id']:'';

        //tạo link
        $link = '';
        $link .= !empty($filterProductName)?'&keyword='.$filterProductName:'';
        $link .= !empty($filterCategoryId)?'&categoryId='.$filterCategoryId:'';
        $link .= (!empty($itemsPerPage) && (int)$itemsPerPage!=3) ?'&itemsPerPage='.$itemsPerPage:'';

        $productList = $model->getProducts($page,$filterProductId, $filterCategoryId,$filterProductName,$itemsPerPage);
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

    public function edit() {
        //Lấy category thông qua category model trước
        $model = new category_model();
        $categoryList = $model->getAllCategories();
        //HẾT Lấy category thông qua category model trước
        $model = new default_model();
        $id = isset($_GET['id'])?$_GET['id']:'';
        $return = isset($_GET['return'])?$_GET['return']:'';
        $product = $model->getProductById($id);
        if ($product==null) {
            //Không tìm thấy sản phẩm với id đã truyền
            $data = [
                'view' => 'error',
                'errDetail' => 'Không tìm thấy Sản phẩm',
                'errReturnLink' => 'products.php'
            ];
        } else {
            //Tìm thấy sản phẩm 
            // Nếu sản phẩm có bài viết thì lấy ra bài viết
            $post = null; //Chưa có bài viết
            if ($product['postId']) {
                $post = $model->getProductPostById($product['postId']);
            };
            $data = [
                'view' => 'layout/product-edit.layout',
                'product' => $product,
                'post' => $post,
                'categoryList' => $categoryList,
                'mode' => 'edit',
                'return'=> $return  //Link return
            ];
        }
        return $data;
    }

    public function add() {
        //Lấy category thông qua category model trước
        $model = new category_model();
        $categoryList = $model->getAllCategories();
        //HẾT Lấy category thông qua category model trước
        $model = new default_model();
        
        //Tìm thấy sản phẩm 
        // Nếu sản phẩm có bài viết thì lấy ra bài viết
        $post = null; //Chưa có bài viết
        //Tạo sản phẩm trống
        $product = [
            'id' => null,
            'name'=> '',
            'price'=> 0,
            'description'=>'',
            'catName' => '',
            'thumbnail_url' => '',
            'categoryId'=> null,
            'postId'=>null,
        ];

        // array(8) { ["id"]=> string(1) "1" ["name"]=> string(33) "Bộ 3 hộp thủy tinh L&L Euro" ["price"]=> string(6) "570000" ["catName"]=> string(15) "Hộp kín hơi" ["description"]=> string(18) "LLG214*2, LLG224*1" ["thumbnail_url"]=> string(5) "1.jpg" ["categoryId"]=> string(2) "11" ["postId"]=> string(1) "0" }

        $data = [
            'view' => 'layout/product-edit.layout',
            'product' => $product,
            'post' => $post,
            'categoryList' => $categoryList,
            'mode' => 'add'
        ];
        
        return $data;
    }

    public function save() {
      
            $model = new default_model();
            $postContent = '';
            if (isset($_POST['editor1']) && !empty($_POST['editor1']) && $_POST['editor1']!='<h1>Thêm bài viết mới giới thiệu về sản phẩm</h1>') {
                $postContent = $_POST['editor1'];
            }
    
            $product = [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'description' => isset($_POST['description'])?$_POST['description']:'',
                'categoryId' => $_POST['categoryId'],
                'price' => $_POST['price'],
                'postContent'=> $postContent,
                'return' => isset($_POST['return'])?$_POST['return']:'',
            ];
    
            $result = $model->saveProduct($product);
            $_SESSION['notification'] = '<p class="text-success">Đã cập nhật thông tin cho sản phẩm <strong>'.$product['name'].'</strong></p>';
            header('location: ?'.$product['return'].'&notification=show');
            exit();

        
            $data = [
                'view' => 'error',
                'errDetail' => 'Đã xảy ra lỗi trong quá trình Lưu sản phẩm',
                'errReturnLink' => 'products.php'
            ];
    
            return $data;
    }

    public function delete() {
        $id =  isset($_GET['id'])?(int)$_GET['id']:null;
        $return = isset($_GET['return'])?$_GET['return']:'';
        $model = new default_model();
        $sqlresult = $model->deleteProductById($id);
        if ($sqlresult == false) {
            $data = [
                'view' => 'error',
                'errDetail' => 'Xóa sản phẩm thất bại',
                'errReturnLink' => 'products.php'
            ];
        } else {
            $_SESSION['notification'] = '<p class="text-success">Đã xóa sản phẩm thành công</strong></p>';
            header('Location: products.php?'.$return.'&notification=show');
        }

        return $data;    
    }

}