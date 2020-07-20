<?php
include './model/register.model.php';
class controller
{
    public function default(){
        
        if ((!isset($_POST['username']) || $_POST['username']=="")) {
            //Nếu người dùng không truyền thông tin đăng nhập lên như id và mật khẩu
            $data = [
                'view' => 'register',
                'notification' => ''
            ];
            // var_dump('người dùng không gửi thông tin');
        } else {
            //Nếu người dùng có POST form đăng ký
            $username = isset($_POST['username'])?$_POST['username']:"";
            $password = isset($_POST['password'])?$_POST['password']:"";
            $email = isset($_POST['email'])?$_POST['email']:"";
            $fullname = isset($_POST['fullname'])?$_POST['fullname']:"";
            

            $msgErr = '<div class="alert alert-warning" role="alert">Có lỗi xảy ra trong quá trình đăng ký tài khoản!</div>';
            $sqlSuccess = false;
            if ($username != "" && $password  != "" && $email != "" && $fullname != "" ) {
                $model = new default_model();
                $account['username'] = $username;
                $account['password'] = $password;
                $account['email'] = $email;
                $account['fullname'] = $fullname;
                $sqlSuccess = $model->insertNewAccount($account);
            }

            if ($sqlSuccess) {
                //Cài đặt session để người dùng vừa đăng ký tự động đăng nhập
                $_SESSION['user_info'] = $model->getUserInfo($username);    

                $data = [
                    'view' => 'welcome',
                    'title'=> 'Thành viên mới',
                    'name' => $fullname,
                    'adminPage' => 2         //Không phải admin = user bình thường
                ];
            } else {
                $data = [
                    'view' => 'register',
                    'notification' => $msgErr
                ];
            }
        }

               
        

        
        
        
        return $data;
    }
} 
        
        
    

?>
