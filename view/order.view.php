<?php 
    include_once('./view/layout/breadcrumb.php');
?>
<div class="container">
<div class="card">
        <div class="card-header">
            <div class="card-title">Đơn hàng của bạn</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
                <form action="" method="get">
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-form-label">Tìm tên sản phẩm</label>
                        <div class="pl-2 pr-3">
                            <input value="" name="keyword" type="text" class="form-control input-full" id="inlineinput" placeholder="--Nhập tên sản phẩm--">
                        </div>
                        <label for="inlineinput" class="col-form-label">Lọc theo danh mục</label>
                        <div class="pl-2 pr-3">
                            <select class="form-control input-square" id="squareSelect" name="categoryId">
                                <option value="">(Không chọn)</option>
                            </select>
                        </div>
                        <label for="inlineinput" class="col-form-label">Hiển thị mỗi trang</label>
                        <div class="pl-2 pr-3">
                            <select class="form-control input-square" id="squareSelect" name="itemsPerPage">
                                                                    <option value="1">
                                        1 sản phẩm
                                    </option>
                                                                    <option value="2">
                                        2 sản phẩm
                                    </option>
                                                                    <option value="3" selected="">
                                        3 sản phẩm
                                    </option>
                                                                    <option value="4">
                                        4 sản phẩm
                                    </option>
                                                                    <option value="5">
                                        5 sản phẩm
                                    </option>
                                                                    <option value="6">
                                        6 sản phẩm
                                    </option>
                                                                    <option value="7">
                                        7 sản phẩm
                                    </option>
                                                                    <option value="8">
                                        8 sản phẩm
                                    </option>
                                                                    <option value="9">
                                        9 sản phẩm
                                    </option>
                                                                    <option value="10">
                                        10 sản phẩm
                                    </option>
                                                            </select>
                        </div>
                        <div class="pl-2">
                            <button type="submit" class="btn btn-success">Lọc</button>
                            <a href="products.php" class="btn btn-danger">Xóa bộ lọc</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="notification">
                                
            </div>
                        <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">STT</th>
                            <th style="width: 30%">Mã đơn hàng</th>
                            <th style="width: 15%">Tổng sản phẩm</th>
                            <th style="width: 10%">Giá trị</th>
                            <th style="width: 15%">Thanh toán</th>
                            <th style="width: 15%">Vận chuyển</th>
                            
                            <th class="text-center" style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['orders'] as $key => $value) { ?>
                            <tr>
                                <th scope="row" class="text-center">1</th>
                                <td><?=$value['order_code']?></td>
                                <td></td>
                                <td>749,000 đ</td>
                                <td>Nồi chảo/ Nồi áp suất</td>
                                <td>Nồi chảo/ Nồi áp suất</td>
                                <td class="text-center">
                                    <a href="?action=edit&amp;id=8&amp;return=%26page%3D1" class="btn btn-success text-white btn-sm"><i class="la la-edit"></i></a>
                                    <button data-return="%26page%3D1" data-action="delete_product" data-item="eyJpZCI6IjgiLCJuYW1lIjoiTlx1MWVkM2kgbmhcdTAwZjRtIGNoXHUxZWQxbmcgZFx1MDBlZG5oIEJBVU0gTWFyYmxlIDI0Y20sIDIgdGF5IGNcdTFlYTdtLCBuXHUxZWFmcCB0aFx1MWVlN3kgdGluaCwgaGlcdTFlYzd1IEwmTCIsInByaWNlIjoiNzQ5MDAwIiwiY2F0TmFtZSI6Ik5cdTFlZDNpIGNoXHUxZWEzb1wvIE5cdTFlZDNpIFx1MDBlMXAgc3VcdTFlYTV0IiwiZGVzY3JpcHRpb24iOm51bGwsInRodW1ibmFpbF91cmwiOiI3LmpwZyIsImNhdGVnb3J5SWQiOiIxNiIsImNyZWF0ZWQiOiIyMDIwLTA3LTE2IDE0OjQxOjI5In0=" type="button" data-toggle="modal" data-target="#modalUpdate" data-whatever="product" href="?action=delete&amp;id=8" class="btn btn-danger text-white btn-sm"><i class="la la-trash"></i></button>
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
                                </td>
                            </tr>
                        <?php } ?> 
                            </tbody>
                </table>
            </div>
                    </div>
                <div class="card-footer">
            <ul class="pagination pg-primary">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Trang trước</span>
                    </a>
                </li>

                                                        <li class="page-item active"><a class="page-link" href="?page=1">1</a></li>
                                                                            <li class="page-item "><a class="page-link" href="?page=2">2</a></li>
                                                                            <li class="page-item "><a class="page-link" href="?page=3">3</a></li>
                                    
                <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                                <li class="page-item">
                    <a class="page-link" href="?page=2" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Tiếp theo</span>
                    </a>
                </li>
                            </ul>
        </div>
            </div>
            </div>


<?php if(isset($data['product'])!=false) {?>

<div class="container">
    <div id="product-detail">
        <div class="product-title">
            <h6>LOCK&LOCK</h6>
            <h5><?=$data['product']['name']?></h5>
            <p><?=$data['product']['description']?></p>
        </div>
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
                            <input type="number" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Nhập số lượng cần mua" value="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

