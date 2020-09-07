<?php
    $activePrice = isset($_GET['activePrice'])?$_GET['activePrice']:'index';
?>
<?php 
    include_once('./view/layout/breadcrumb.php');
    $masterData = new master_data_model();
?>
<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="card-title">Giỏ hàng của bạn</div>
    </div>
    <div class="card-body">
      <!-- <div class="card-sub">
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
            </div> -->
      <div class="notification"></div>
      <?php if (isset($data['cartSession'])) {?>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 5%;">STT</th>
              <th class="text-center" style="width: 25%;">Tên sản phẩm</th>
              <th class="text-center" style="width: 17%;">Đơn giá</th>
              <th class="text-center" style="width: 10%;">Số lượng</th>
              <th class="text-right" style="width: 10%;">Thành tiền</th>
              <th class="text-center" style="width: 10%;">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['cartSession'] as $key =>
            $value) { ?>
            <tr>
              <th scope="row" class="text-center"><?=$key?></th>
              <td class="text-center"><?=$value['name']?></td>
              <td class="text-center"><?=number_format($value['price'])?>đ</td>
              <td class="text-center"><?=($value['quantity']<10 && $value['quantity']) > 0?'0':''?><?=number_format($value['quantity'])?> <?=$value['unit']?></td>
              <td class="text-right">
                <?=number_format($value['price']*$value['quantity'])?>đ
              </td>
              <td class="text-center">
                <a href="#" class='btn btn-outline-danger'><i class="fas fa-trash-alt"></i>Xoá</a>
              </td>
            </tr>
            <?php } ?>
            <?php if (count($data['cartSession']) > 0) { ?>
              <td class="text-right" colspan="4"><strong>Tổng cộng:</strong></td>
              <td class="text-right"><strong><?=number_format($data['sum'])?>đ</strong></td>
            <?php } ?>
          </tbody>
        </table>
        <!-- Nút thanh toán -->
        <div class="text-right" <?=$activePrice=='index'?'active':'' ?>>
          <!-- <a href="#" class='btn btn-outline-primary'>Tiếp tục mua sắm</a> -->
          <a href="price.php" class='btn btn-outline-primary'>Thanh toán</a>
        </div>
      </div>
        <?php } else {?>
            <div class="text-center">
                <img src="./img/skin/emptycart.png" alt="" srcset="">
                <h3 class="text-primary">Bạn chưa có sản phẩm nào trong giỏ hàng</h3>
                <a href='index.php' type="button" class="btn btn-outline-primary">Bấm vào đây để tiếp tục mua sắm</a>

            </div>
        <?php } ?>
    </div>
    <div class="card-footer">

    </div>
  </div>
</div>


