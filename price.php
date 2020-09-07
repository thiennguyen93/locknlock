<?php
$controller = 'price';
include './lib/database.php';
include 'router.php';
?>
<!doctype html>
<html lang="en">
<?php
include_once('./view/layout/head.php');
?>
<body>
    <div id="wrapper">
        <!-- HEADER -->
        <?php
        include_once('./view/layout/header.php');
        ?>
        <!-- /HEADER -->
        <?php include_once './view/' . $view; ?>
        <!-- FOOTER -->
        <?php
        include_once('./view/layout/footer.php');
        ?>
        <!-- /FOOTER -->
</body>

</html>