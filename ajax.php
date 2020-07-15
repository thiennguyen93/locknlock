<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'check'; //Mặc định là action default
$controller = "ajax";
include './lib/database.php';
$ajaxResult = "";
include './controller/ajax.controller.php';      //ajax.controller.php
$ajaxObject = new ajaxcontroller();
$ajaxResult = $ajaxObject->{ $action }();
?>

<?=$ajaxResult?>