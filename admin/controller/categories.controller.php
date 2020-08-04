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
        var_dump($_POST);
        exit();

        


        $categoryData = null;
        $categoryData['id'] = isset($_POST['id'])?(int)$_POST['id']:'';
        $categoryData['name'] = isset($_POST['name'])?$_POST['name']:'';
        $categoryData['isFrontPage'] = (isset($_POST['isFrontPage']) && _POST['isFrontPage'] == 'Y')?$_POST['isFrontPage']:'N';




        $model = new category_model();
        //Test
        $count = $model->checkCategoryById($categoryData['id'] );
        var_dump($count);
        exit();

    }
}