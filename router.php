<?php

$controller = isset($controller) ? $controller : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'default'; //Mặc định là action default

include './controller/'.$controller.'.controller.php';
$controllerObject = new controller();

$data = $controllerObject->{ $action }();
$view = $data['view'] . '.view.php';

?>