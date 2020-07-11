<?php
$controller = isset($controller) ? $controller : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

include './controller/'.$controller.'.controller.php';
$controllerObject = new controller();

$data = $controllerObject->{ $action }();
$view = $data['view'] . '.view.php';

?>