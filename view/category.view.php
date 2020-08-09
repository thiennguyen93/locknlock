<?php 
    include_once('./view/layout/breadcrumb.php');
?>


<?php if(isset($data['product'])!=false) {?>

<div class="container">
    <div class="row">
        <div class="sanpham-item col-6 col-md-4 col-lg-3 px-3">
            <div class="sanpham-item-name">
                <a class="product-detail-url" href="product.php?id=1">
                    <img src="./img/products/1.jpg" alt="" srcset="">
                    <p>Bộ 3 hộp thủy tinh L&amp;L Euro</p>                                   
                </a>
            </div>
            <strong>570,000 đ</strong>
        </div>
    </div>
</div>


<?php } else { 
    include_once('./view/layout/404product.php');
}
?>

