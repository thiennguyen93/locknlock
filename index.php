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




        <div class=" container list_DM">
            <div class="head_DM">
                <h2>DANH MỤC SẢN PHẨM</h2>
                <span>Bạn có thể xem được sản phẩm đa dạng của LOCK&LOCK</span>
            </div>
            <div class="list_box">
                <ul class="">
                    <li>
                        <p>BÌNH NƯỚC</p>
                        <span>
                            <a href="http://118.69.170.90/goods/category.asp?cate=124">Xem thêm &gt;</a>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="list_n_box">
                <div class="row">
                    <div class="catImg col-lg-5">
                        <img src="./img/skin/CA_water_bottle.png" alt="">
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="row">
                            <div class="sanpham-item col-6 col-md-4">
                                <img src="img/products/201806157274562.jpg" alt="" srcset="">
                                <p>Bình nhựa đựng nước Lock&Lock dung tích 520ml</p>
                                <strong>198,000đ</strong>
                            </div>
                            <div class="sanpham-item col-6 col-md-4">
                                <img src="img/products/201806157274562.jpg" alt="" srcset="">
                                <p>Bình nhựa đựng nước Lock&Lock dung tích 520ml</p>
                                <strong>198,000đ</strong>
                            </div>
                            <div class="sanpham-item col-6 col-md-4">
                                <img src="img/products/201806157274562.jpg" alt="" srcset="">
                                <p>Bình nhựa đựng nước Lock&Lock dung tích 520ml</p>
                                <strong>198,000đ</strong>
                            </div>
                            <div class="sanpham-item col-6 col-md-4">
                                <img src="img/products/201806157274562.jpg" alt="" srcset="">
                                <p>Bình nhựa đựng nước Lock&Lock dung tích 520ml</p>
                                <strong>198,000đ</strong>
                            </div>
                            <div class="sanpham-item col-6 col-md-4">
                                <img src="img/products/201806157274562.jpg" alt="" srcset="">
                                <p>Bình nhựa đựng nước Lock&Lock dung tích 520ml</p>
                                <strong>198,000đ</strong>
                            </div>
                            <div class="sanpham-item col-6 col-md-4">
                                <img src="img/products/201806157274562.jpg" alt="" srcset="">
                                <p>Bình nhựa đựng nước Lock&Lock dung tích 520ml</p>
                                <strong>198,000đ</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer" class="mt-5 mb-1">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="support px-3 py-3">
                            <h5>Chăm sóc khách hàng</h5>
                            <p>028-5413 5756 (488)</p>
                            <p class="email">Email : thubui@locknlock.com</p>
                            <p>
                                Các ngày trong tuần<br>
                                (Thứ Hai ~ Thứ Sáu) 09:00 ~ 18:00<br>
                                Thứ bảy, chủ nhật và ngày lễ
                            </p>
                        </div>
                        <img class="w100p" src="./img/skin/mainService_lSide_banner02.jpg" alt="" srcset="">
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 text-center">
                        <img class="w100p" src="./img/skin/mainService_rSide_middle.jpg" alt="" srcset="">
                        <img class="my-3" src="./img/skin/mainService_rSide_bottomBottom_tit.png" alt="" srcset="">
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <img class="w100p mb-1" src="./img/skin/untitled_1.png" alt="" srcset="">
                        <img class="w100p mt-2" src="./img/skin/20170101_1.png" alt="" srcset="">
                        <h5 class="mt-2">Notice</h5>
                        <hr class="mt-0 mb-0">
                        <a class="footer-notice-link" href="#" target="_blank" rel="noopener noreferrer">CBHQ -BÌNH ĐỰNG NƯỚC LOCKLOCK NHỰA P...</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-menu" class=" mt-2">
            <div class="container">
                <ul class="row mt-2">
                    <li><a href="">Giới thiệu công ty</a></li>
                    <li><a href="">Điều khoản</a></li>
                    <li><a href="">Chính sách xử lý thông tin</a></li>
                    <li><a href="">Từ chối thư rác</a></li>
                    <li><a href="">Chăm sóc khách hàng</a></li>
                    <li><a href="">Sơ đồ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="footer-info">
        <div class="container addressBox">
            <ul class="address">
                <img class="logo_footer_left" src="./img/skin/logo.png" alt="" srcset="">
                <li>CÔNG TY TNHH LOCK&amp;LOCK HCM</li>
                
                <li>
                    Giấy CNĐKDN : 0309921077 –Ngày cấp :17/03/2010  ,  được sửa đổi lần thứ 08 ngày : 16/11/2015 
                    được sửa đổi lần thứ
                </li>
                
                <li>Cơ quan cấp : Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu tư TP.HCM</li>
                <li>Địa chỉ đăng ký kinh doanh : 27487 77 Hoàng Văn Thái. Phường Tân Phú , Quận 7, TP HCM</li>
            </ul>
        </div>
    </div>

    <!-- Kiểm tra 11  dfs-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script>
        $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            autoPlay: true
        });
    </script>

</body>

</html>