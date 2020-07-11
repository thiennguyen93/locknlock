<?php 
include './lib/database.php';
include 'router.php';
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div id="wrapper">
        <!-- HEADER -->
        <?php
            include_once('./view/layout/header.php');
        ?>
        <!-- /HEADER -->

        <!-- SLIDER & CATEGORY -->
        <?php
            include_once('./view/layout/slider.php');
        ?>
        <!-- /SLIDER & CATEGORY -->


        <?php include_once './view/'.$view; ?>


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