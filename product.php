<!-- TRANG SẢN PHẨM -->
<?php
$controller = 'product';
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



        <!-- Kiểm tra 11  dfs-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->


</body>

</html>