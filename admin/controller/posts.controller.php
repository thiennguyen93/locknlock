<?php
include './model/posts.model.php';
include './model/categories.model.php';
class controller {
    public function default() {
        //Lấy category thông qua category model trước
        $model = new default_model();
        $authorList = $model->getAllAuthors();
        //HẾT Lấy category thông qua category model trước

        
        $page = (int)(isset($_GET['page'])?($_GET['page']>0?$_GET['page']:1):1);
        $itemsPerPage = (int)(isset($_GET['itemsPerPage'])?($_GET['itemsPerPage']>0?$_GET['itemsPerPage']:3):3);
        $itemsPerPage = $itemsPerPage > 10?10:$itemsPerPage;
        $filterPostTitle = isset($_GET['keyword'])?$_GET['keyword']:'';
        $filterAuthorId = isset($_GET['authorId'])?$_GET['authorId']:'';
        $filterPostId = isset($_GET['id'])?$_GET['id']:'';

        //tạo link
        $link = '';
        $link .= !empty($filterPostTitle)?'&keyword='.$filterPostTitle:'';
        $link .= !empty($filterAuthorId)?'&authorId='.$filterAuthorId:'';
        $link .= (!empty($itemsPerPage) && (int)$itemsPerPage!=3) ?'&itemsPerPage='.$itemsPerPage:'';

        $postList = $model->getPosts($page,$filterPostId, $filterAuthorId,$filterPostTitle,$itemsPerPage);
        $data = [
            'view' => 'posts',
            'postList' => $postList['posts'],
            'totalPages' =>  $postList['totalPages'],
            'page' => $page,
            'itemPerPage' => $itemsPerPage,
            'authorList' => $authorList,
            'link' => $link
        ];
          return $data;
    }

    public function edit() {
        $model = new default_model();
        $id = isset($_GET['id'])?$_GET['id']:'';
        $return = isset($_GET['return'])?$_GET['return']:'';
        $post= $model->getPostById($id);
        if ($post==null) {
            //Không tìm thấy sản phẩm với id đã truyền
            $data = [
                'view' => 'error',
                'errDetail' => 'Không tìm thấy Sản phẩm',
                'errReturnLink' => 'products.php'
            ];
        } else {
            //Tìm thấy sản phẩm 
            // Nếu sản phẩm có bài viết thì lấy ra bài viết
            $data = [
                'view' => 'layout/post-edit.layout',
                'post' => $post,
                'mode' => 'edit',
                'return'=> $return  //Link return
            ];
        }
        return $data;
    }

    public function add() {
        //Lấy category thông qua category model trước
        $model = new category_model();
        $authorList = $model->getAllCategories();
        //HẾT Lấy category thông qua category model trước
        $model = new default_model();
        
        //Tìm thấy sản phẩm 
        // Nếu sản phẩm có bài viết thì lấy ra bài viết
        $post = null; //Chưa có bài viết
        //Tạo sản phẩm trống
        $post = [
            'id' => null,
            'title'=> '',
            'authorName'=> 0,
            'authorId'=>'',
            'description' => '',
            'content' => '',
            'authorId'=> null,
            'postId'=>null,
        ];

        // array(8) { ["id"]=> string(1) "1" ["name"]=> string(33) "Bộ 3 hộp thủy tinh L&L Euro" ["price"]=> string(6) "570000" ["catName"]=> string(15) "Hộp kín hơi" ["description"]=> string(18) "LLG214*2, LLG224*1" ["thumbnail_url"]=> string(5) "1.jpg" ["authorId"]=> string(2) "11" ["postId"]=> string(1) "0" }

        $data = [
            'view' => 'layout/post-edit.layout',
            'post' => $post,
            'mode' => 'add'
        ];
        
        return $data;
    }

    public function save() {

            // var_dump($_POST);
            // exit;
      
            $model = new default_model();
            $content = 'Bài viết chưa cập nhật nội dung';
            if (isset($_POST['editor1']) && !empty($_POST['editor1'])) {
                $content = $_POST['editor1'];
            }

               
            $post= [
                'id' => $_POST['id'],
                'title' => $_POST['title'],
                'description' => isset($_POST['description'])?$_POST['description']:'',
                'authorId' => $_SESSION['user_info']['id'],
                'authorName' => $_SESSION['user_info']['hoten'],
                'content'=> $content,
                'return' => isset($_POST['return'])?$_POST['return']:'',
            ];
    
            $sqlresult = $model->savePost($post);
            if ($sqlresult == false) {
                $data = [
                    'view' => 'error',
                    'errDetail' => 'Xảy ra lỗi trong quá trình lưu bài viết',
                    'errReturnLink' => 'posts.php'
                ];
            } else {
                $_SESSION['notification'] = '<p class="text-success">Đã cập nhật bài viết thành công</strong></p>';
                header('Location: posts.php?'.$post['return'].'&notification=show');
                exit();
            }
    
            return $data;
    }

    public function delete() {
        $id =  isset($_GET['id'])?(int)$_GET['id']:null;
        $return = isset($_GET['return'])?$_GET['return']:'';
        $model = new default_model();
        $sqlresult = $model->deletePostById($id);
        if ($sqlresult == false) {
            $data = [
                'view' => 'error',
                'errDetail' => 'Xóa sản phẩm thất bại',
                'errReturnLink' => 'posts.php'
            ];
        } else {
            $_SESSION['notification'] = '<p class="text-success">Đã xóa bài viết thành công</strong></p>';
            header('Location: posts.php?'.$return.'&notification=show');
        }

        return $data;    
    }

}