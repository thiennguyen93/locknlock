<?php
    $activePage = isset($_GET['activePage'])?$_GET['activePage']:'index';
?>
<div id="header" class="container clearfix">
    <div id="header-1">
        <?php 
            include_once('./view/layout/top_user_area.php');
        ?>
    </div>
    <div id="header-2" class="clearfix">
        <ul class='left-icon'>
            <li>
                <a href="#">
                    <img src="./img/skin/top_icon_event.png" alt="Sự kiện">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="./img/skin/top_icon_coupon.png" alt="Sự kiện">
                </a>
            </li>
        </ul>
        <div id="logo">
            <a href="#">
                <img src="./img/skin/logo.png" alt="Sự kiện">
            </a>
        </div>
        <ul class='right-icon'>
            <li>
                <a href="cart.php">
                    <img src="./img/skin/top_icon_cart.png" alt="Sự kiện">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="./img/skin/top_icon_wish.png" alt="Sự kiện">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="./img/skin/top_icon_truck.png" alt="Sự kiện">
                </a>
            </li>
        </ul>
    </div>
</div>
<div id="header-menu" class="text-uppercase border-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white container">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                <a class="nav-link <?=$activePage=='index'?'active':'' ?>" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Sản phẩm mới</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=$activePage=='about'?'active':'' ?>" href="post.php?id=2&activePage=about">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=$activePage=='contact'?'active':'' ?>" href="contact.php?activePage=contact">Liên hệ</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" class="form-control-sm" placeholder="Tìm kiếm">
                    <div class="input-group-append">
                        <button class="btn btn-secondary btn-sm" type="button">Button</button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>


