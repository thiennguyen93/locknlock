<?php
include './model/register.model.php';
class controller
{
    public function default(){
        $data = ["view"=>"404error"];
        if (!isset($_SESSION['user_info'])) {
            //Nếu user chưa đăng nhập
            if ((!isset($_POST['username']) || $_POST['username']=="")) {
                //Nếu người dùng không truyền thông tin đăng nhập lên như id và mật khẩu
                $data = [
                    'view' => 'register',
                    'notification' => ''
                ];
                // var_dump('người dùng không gửi thông tin');
            } else {
                // var_dump('người dùng gửi thông tin');
                $model = new default_model();
                $username = $_POST['username'];
                $password = isset($_POST['password'])?$_POST['password']:"";
                $isLoginCorrect = $model->checkLoginInfo($username, $password);
                if ($isLoginCorrect) {
                    //Nếu đăng nhập thành công --> cài đặt SESSION --> Chào mừng người dùng 
                    $user_info = $model->getUserInfo($username);
                    $_SESSION['user_info'] = $user_info;    
                    // var_dump($user_info);
                    $data = [
                        'view' => 'welcome',
                        'username' => $username,
                        'name' => $user_info['hoten'],
                        'title' => $user_info['chucvu'],
                        'adminPage' => $user_info['adminPage']
                    ];      
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
