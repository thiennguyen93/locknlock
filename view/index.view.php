<div class=" container list_DM">
    <div class="head_DM">
        <h2>DANH MỤC SẢN PHẨM</h2>
        <span>Bạn có thể xem được sản phẩm đa dạng của LOCK&LOCK</span>
    </div>
    <?php
    foreach ($data['data'] as $key => $item) {
        // var_dump($item['product']); 
    ?>
        <div class="mb-5">

            <div class="list_box">
                <ul class="">
                    <li>
                        <p><?= $item['cat']['name'] ?></p>
                        <span>
                            <a href="http://118.69.170.90/goods/category.asp?cate=124">Xem thêm &gt;</a>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="list_n_box">
                <div class="row">
                    <div class="catImg col-lg-5">
                        <img src="./img/categories/<?= $item['cat']['url_img'] ?>" alt="">
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="row">
                            <?php foreach ($item['product'] as $key => $itemProduct) { ?>
                                <div class="sanpham-item col-6 col-md-4">
                                    <div class="sanpham-item-name">
                                        <a class="product-detail-url" href="product.php?id=<?= $itemProduct['id'] ?>">
                                            <img src="./img/products/<?= $itemProduct['thumbnail_url'] ?>" alt="" srcset="">
                                            <p><?= $itemProduct['name'] ?></p>                                   
                                        </a>
                                    </div>
                                    <strong><?php echo number_format($itemProduct['price']) ?> đ</strong>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>