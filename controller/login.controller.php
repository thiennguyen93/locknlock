<?php
// include './model/product.model.php';
include './model/login.model.php';
class controller
{
    public function default(){
        $data = ["view"=>"404error"];
        var_dump( $_SESSION['user_info']);
        if (!isset($_SESSION['user_info'])) {
            //Nếu user chưa đăng nhập
            if ((!isset($_POST['username']) || $_POST['username']=="")) {
                //Nếu người dùng không truyền thông tin đăng nhập lên như id và mật khẩu
                $data = [
                    'view' => 'login',
                    'notification' => ''
                ];
                // var_dump('người dùng không gửi thông tin');
            } else {
                // var_dump('người dùng gửi thông tin');
                $model = new default_model();
                $username = $_POST['username'];
                $password = isset($_POST['password'])?$_POST['password']:"";
                $isLoginCorrect = $model->checkLoginInfo($username, $password);
                var_dump($isLoginCorrect);
                if ($isLoginCorrect) {
                    //Nếu đăng nhập thành công --> cài đặt SESSION --> Chào mừng người dùng 
                    $user_info = $model->getUserInfo($username);
                    $_SESSION['user_info'] = $user_info;
                    var_dump( $_SESSION['user_info']);
                    
                    
                } else {
                    //Nếu đăng nhập thất bại --> Trả về thông báo
                    $data = [
                        'view' => 'login',
                        'notification' => '<div class="alert alert-warning" role="alert">Thông tin đăng nhập chưa chính xác!</div>',
                        'username' => $username
                    ];
                };
            }
        } else {
            //Nếu người dùng đã đăng nhập
        }

        return $data;


    }
}
