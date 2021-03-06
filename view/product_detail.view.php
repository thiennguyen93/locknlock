<?php 
    include_once('./view/layout/breadcrumb.php');
?>


<?php if(isset($data['product'])!=false) {?>

<div class="container">
    <div id="product-detail">
        <div class="product-title">
            <h6>LOCK&LOCK</h6>
            <h5><?=$data['product']['name']?></h5>
            <p><?=$data['product']['description']?></p>
        </div>
        <form action="cart.php">
        <input type="hidden" name="action" value='add'>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img class='product-detail-img' src="./img/products/<?=$data['product']['thumbnail_url']?>" alt="" srcset="">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-3 pt-3">Giá bán</div>
                    <div class="col-9 product-detail-price"><?=number_format($data['product']['price'])?>đ</div>
                </div>
                <div class="row mt-2">
                    <div class="col-3">Số lượng</div>
                    <div class="col-9 ">
                        <div class="form-group form-inline">
                            <label for=""></label>
                            <input type="hidden" name="id" value="<?=$data['product']['pID']?>">
                            <input type="number" class="form-control" name="quantity" id="" aria-describedby="helpId" placeholder="Nhập số lượng cần mua" value="1">
                            <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>
    <div class="product-detail-content">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin sản phẩm </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Nhận xét</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Chính sách đổi trả</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?=$data['product']['content']?>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <!-- Chính sách giao hàng/đổi hàng/trả hàng -->
                <?php
                    include_once("./view/layout/product_return_policy.php");
                ?>
            </div>
        </div>
    </div>
</div>


<?php } else { 
    include_once('./view/layout/404product.php');
}
?>

