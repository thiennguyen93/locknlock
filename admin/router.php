<?php

if (!isset($_SESSION['user_info']) && $controller!='login') {
    //Nếu chưa đăng nhập thì không được truy cập vào bất cứ đường dẫn nào thuộc admin trừ trang login
    header('Location: login.php');
} else {





$controller = isset($controller) ? $controller : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'default'; //Mặc định là action default

include_once './controller/'.$controller.'.controller.php';
$controllerObject = new controller();

$data = $controllerObject->{ $action }();


$view = $data['view'] . '.view.php';


//BẮT ĐẦU: Gọi controller GLOBAL lấy những thông tin chung
include './controller/global.controller.php';
$globalControllerObject = new globalController();
$globalInfo = $globalControllerObject->getGlobalInfo();
$data['global'] = $globalInfo;
//HẾT: Gọi controller GLOBAL lấy những thông tin chung

}

?>