<?php
include './model/categories.model.php';
class controller {
    public function default() {
        $model = new category_model();
        $allCategories = $model->getAllCategories();
        $data = [
            'view' => 'categories',
            'allCategories' => $allCategories
        ];
          return $data;
    }

    public function edit() {
        //Tương ứng với action=edit
        $model = new category_model();
        $category = $model->getCategory($_GET['id']);
        $allCategories = $model->getAllCategories();
        //Nếu không tìm thấy danh mục
        if (!$category) {
            $data = [
                'view' => 'error',
                'errDetail' => 'Không tìm thấy Danh mục',
                'errReturnLink' => 'categories.php'
            ];
        } else {
            //Lấy thông tin danh mục cha nếu có 
            $data = [
                'view' => 'layout/category-edit.layout',
                'category' => $category,
                'allCategories'=>$allCategories,
                'mode'=>'edit'
            ];
        };
        return $data;
    }

    public function add() {
        $model = new category_model();
        $allCategories = $model->getAllCategories();
        
        //Tìm thấy sản phẩm 
        // Nếu sản phẩm có bài viết thì lấy ra bài viết
        $category = null; //Chưa có bài viết
        //Tạo sản phẩm trống
        $category = [
            'id' => null,
            'name'=> '',
            'description'=>'',
            'url_img' => '',
            'parentId' => null,
            'isFrontPage'=>null            
        ];

        // array(8) { ["id"]=> string(1) "1" ["name"]=> string(33) "Bộ 3 hộp thủy tinh L&L Euro" ["price"]=> string(6) "570000" ["catName"]=> string(15) "Hộp kín hơi" ["description"]=> string(18) "LLG214*2, LLG224*1" ["thumbnail_url"]=> string(5) "1.jpg" ["categoryId"]=> string(2) "11" ["postId"]=> string(1) "0" }

        $data = [
            'view' => 'layout/category-edit.layout',
            'category' => $category,
            'allCategories' => $allCategories,
            'mode' => 'add'
        ];
        
        return $data;
    }


    public function save() {   
        $categoryData = null;
        $categoryData['id'] = isset($_POST['id'])?(int)$_POST['id']:'';
        $categoryData['name'] = isset($_POST['name'])?$_POST['name']:'';
        $categoryData['isFrontPage'] = (isset($_POST['isFrontPage']) && $_POST['isFrontPage'] == 'Y')?$_POST['isFrontPage']:'N';
        $categoryData['parentId'] = isset($_POST['categoryId'])?$_POST['categoryId']:'';
        $categoryData['description'] = isset($_POST['description'])?$_POST['description']:'';
        $model = new category_model();
        //Test
        $sqlresult = $model->saveCategory($categoryData);
        
        if ($sqlresult == false) {
            //update hoặc insert category thất bại
            $data = [
                'view' => 'error',
                'errDetail' => 'Xảy ra lỗi trong quá trình lưu danh mục sản phẩm',
                'errReturnLink' => 'categories.php'
            ];
        } else {
            $_SESSION['notification'] = '<p class="text-success">Đã cập nhật thanh công Danh mục sản phẩm</strong></p>';
            header('Location: categories.php?'.$post['return'].'&notification=show');
            exit();
        }

        return true;
    }

    public function delete() {
        //Data mặc định
        $data = [
            'view' => 'error',
            'errDetail' => 'Xảy ra lỗi trong quá trình xóa danh mục sản phẩm',
            'errReturnLink' => 'categories.php'
        ];


        $id = isset($_GET['id'])?(int)$_GET['id']:null;
        $model = new category_model();
        if ($id != null) {
            //Nếu danh mục sản phẩm tồn tại thì xóa đi
            $result = $model->deleteCategoryById($id);
            if ($result == -1) {
                $data = [
                    'view' => 'error',
                    'errDetail' => 'Không được phép xóa danh mục có danh mục con!',
                    'errReturnLink' => 'categories.php?notification=show'
                ];
            } else if ($result==true) {
                $_SESSION['notification'] = '<p class="text-success">Đã xóa danh mục thành công</strong></p>';
                    header('Location: categories.php?notification=show');
                    exit();
            }
        } 

        return $data;
    }
}