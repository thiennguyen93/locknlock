<?php

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

include './controller/'.$controller.'Controller.php';
switch ($controller) {
    case 'index':
        $controllerObject = new indexController();
        break;
    default:
        # code...
        break;
}

$data = $controllerObject->{ $action }();
$view = $data['view'] . '.view.php';

?>