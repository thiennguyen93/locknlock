<?php 
    include_once('./view/layout/breadcrumb.php');
?>


<?php if(count($data['productList'])>0) {?>

<div class="container">
    <div class="row">
    <?php foreach ($data['productList'] as $key => $value) { ?>
        <div class="sanpham-item col-6 col-md-4 col-lg-3 px-3">
            <div class="sanpham-item-name">
                <a class="product-detail-url" href="product.php?id=<?=$value['id']?>">
                    <img src="./img/products/<?=$value['thumbnail_url']?>" alt="" srcset="">
                    <p>Bộ 3 hộp thủy tinh L&amp;L Euro</p>                                   
                </a>
            </div>
            <strong><?=number_format($value['price'])?> đ</strong>
        </div>
        <?php } ?>
    </div>
    <div class="card-footer">
        <?php if ($data['totalPages'] >1) { ?>
            <ul class="pagination pg-primary">
                <!-- <?php if ($data['page'] >1) { //Nếu trang hiện tại là trang đầu tiên thì ẩn Prev đi
                        ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Trang trước</span>
                    </a>
                </li>
                <?php } ?> -->

                <?php
                for ($k = 1; $k <= $data['totalPages']; $k++) {
                ?>
                    <li class="page-item <?= $data['page'] == $k ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $k ?><?=$data['link']?>"><?= $k ?></a></li>
                <?php } ?>

                <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                <!-- <?php if ($data['page'] >= $data['totalPages']) { ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
                <?php } ?> -->
            </ul>
        <?php } ?>
        </div>
</div>



<?php } else { 
    include_once('./view/layout/404product.php');
}
?>

