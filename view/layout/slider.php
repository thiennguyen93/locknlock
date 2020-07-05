<?php
    include_once('./model/category.model.php');
    $cat = new category();
    $categoryData = $cat->getAllCategories();
    function showParentCategories($categories) {
        // Bước 1: Lấy danh sách category con
        $cate_child = array();
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parentId'] == "" )
            {
                var_dump($item['name']);
            }
        }
    }



?>

<div id="content" class="container mt-3">
            <div id="slider">
                <div class="row">
                    <div class="col-lg-3 px-0">
                        <!-- Category menu -->
                        <ul class="list_n_category">
                            <?php 
                                foreach ($categoryData as $key => $item)
                                {
                                    // Nếu là chuyên mục con thì hiển thị
                                    if ($item['parentId'] == "" )
                                    {
                            ?>
                            <li class="">
                                <a href="#"><?=$item['name']?></a>
                                <div class="area_n_category">
                                    <div class="box_n_category">
                                        <h3><a href="#"><?=$item['name']?></a></h3>
                                        <ul class="list_n_category_1">
                                            <li><a href="/goods/category.asp?cate=652&amp;BannerID=10023">Hộp kín
                                                    hơi</a></li>
                                            <li><a href="/goods/category.asp?cate=653&amp;BannerID=10023">Hộp nhựa</a>
                                            </li>
                                            <li><a href="/goods/category.asp?cate=654&amp;BannerID=10023">Hủ gia vị</a>
                                            </li>
                                            <li><a href="/goods/category.asp?cate=655&amp;BannerID=10023">Nắp hộp kín
                                                    hơi</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <?php
                                }
                            }
                            ?>
                        </ul>
                        <!-- /Category menu -->
                    </div>
                    <div class="col-lg-9 px-0  mb-5">
                        <div class="main-carousel">
                            <div class="carousel-cell">
                                <img class="carousel-image" src="./img/skin/slide1.jpg" alt="" srcset="">
                            </div>
                            <div class="carousel-cell">
                                <img class="carousel-image" src="./img/skin/slide2.jpg" alt="" srcset="">
                            </div>
                            <div class="carousel-cell">
                                <img class="carousel-image" src="./img/skin/slide3.jpg" alt="" srcset="">
                            </div>
                            <div class="carousel-cell">
                                <img class="carousel-image" src="./img/skin/slide4.jpg" alt="" srcset="">
                            </div>
                            <div class="carousel-cell">
                                <img class="carousel-image" src="./img/skin/slide5.jpg" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Sản phẩm bán chạy -->
            <div class="zone">
                <div class="zone_title">
                    <span class="zone_caption text-uppercase ">Sản phẩm bản chạy</span>
                    <span class="more ml-3"><a href="/goods/best.asp?mall_type=0&amp;BannerID=10034"> Xem thêm</a>
                    </span>
                </div>
                <div class="zone_content">
                    <div class="carousel" data-flickity='{ "autoPlay": true, "cellAlign": "left" }'>
                        <div class="carousel-cell sanpham">
                            <div class="sanphamIMG">
                                <img src="http://www.locknlock.vn/data/base/goods/small/201829053857496.jpg"
                                    alt="Bộ túi hộp cơm thủy tinh L&amp;L 4EA  (LLG422*3, HWB801WN-B-0*1) - Màu Wine">
                            </div>
                            <div class="sanphamInfo">
                                <p>
                                    Bộ túi hộp cơm thủy tinh L&L 4EA (LLG422*3, HWB801WN-B-0*1) - Màu Wine
                                </p>
                            </div>
                            <div class="sanphamPrice">
                                <p>
                                    620,000đ
                                </p>
                            </div>
                        </div>
                        <div class="carousel-cell sanpham">
                            <div class="sanphamIMG">
                                <img src="http://www.locknlock.vn/data/base/goods/small/201829053857496.jpg"
                                    alt="Bộ túi hộp cơm thủy tinh L&amp;L 4EA  (LLG422*3, HWB801WN-B-0*1) - Màu Wine">
                            </div>
                            <div class="sanphamInfo">
                                <p>
                                    Bộ túi hộp cơm thủy tinh L&L 4EA (LLG422*3, HWB801WN-B-0*1) - Màu Wine
                                </p>
                            </div>
                            <div class="sanphamPrice">
                                <p>
                                    620,000đ
                                </p>
                            </div>
                        </div>
                        <div class="carousel-cell sanpham">
                            <div class="sanphamIMG">
                                <img src="http://www.locknlock.vn/data/base/goods/small/201829053857496.jpg"
                                    alt="Bộ túi hộp cơm thủy tinh L&amp;L 4EA  (LLG422*3, HWB801WN-B-0*1) - Màu Wine">
                            </div>
                            <div class="sanphamInfo">
                                <p>
                                    Bộ túi hộp cơm thủy tinh L&L 4EA (LLG422*3, HWB801WN-B-0*1) - Màu Wine
                                </p>
                            </div>
                            <div class="sanphamPrice">
                                <p>
                                    620,000đ
                                </p>
                            </div>
                        </div>
                        <div class="carousel-cell sanpham">
                            <div class="sanphamIMG">
                                <img src="http://www.locknlock.vn/data/base/goods/small/201829053857496.jpg"
                                    alt="Bộ túi hộp cơm thủy tinh L&amp;L 4EA  (LLG422*3, HWB801WN-B-0*1) - Màu Wine">
                            </div>
                            <div class="sanphamInfo">
                                <p>
                                    Bộ túi hộp cơm thủy tinh L&L 4EA (LLG422*3, HWB801WN-B-0*1) - Màu Wine
                                </p>
                            </div>
                            <div class="sanphamPrice">
                                <p>
                                    620,000đ
                                </p>
                            </div>
                        </div>
                        <div class="carousel-cell sanpham">
                            <div class="sanphamIMG">
                                <img src="http://www.locknlock.vn/data/base/goods/small/201829053857496.jpg"
                                    alt="Bộ túi hộp cơm thủy tinh L&amp;L 4EA  (LLG422*3, HWB801WN-B-0*1) - Màu Wine">
                            </div>
                            <div class="sanphamInfo">
                                <p>
                                    Bộ túi hộp cơm thủy tinh L&L 4EA (LLG422*3, HWB801WN-B-0*1) - Màu Wine
                                </p>
                            </div>
                            <div class="sanphamPrice">
                                <p>
                                    620,000đ
                                </p>
                            </div>
                        </div>
                        <div class="carousel-cell sanpham">
                            <div class="sanphamIMG">
                                <img src="http://www.locknlock.vn/data/base/goods/small/201829053857496.jpg"
                                    alt="Bộ túi hộp cơm thủy tinh L&amp;L 4EA  (LLG422*3, HWB801WN-B-0*1) - Màu Wine">
                            </div>
                            <div class="sanphamInfo">
                                <p>
                                    Bộ túi hộp cơm thủy tinh L&L 4EA (LLG422*3, HWB801WN-B-0*1) - Màu Wine
                                </p>
                            </div>
                            <div class="sanphamPrice">
                                <p>
                                    620,000đ
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Sản phẩm bán chạy -->
            <div class="thanh_ngan_cach"></div>
        </div>

        