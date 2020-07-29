<div class="container-fluid">
    <h4 class="page-title">Quản lý sản phẩm</h4>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Các mặt hàng đang kinh doanh</div>
        </div>
        <div class="card-body">
            <div class="card-sub">
                <form action="" method="get">
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-form-label">Tìm tên sản phẩm</label>
                        <div class="pl-2 pr-3">
                            <input value='<?=@$_GET['keyword']?>' name='keyword' type="text" class="form-control input-full" id="inlineinput" placeholder="--Nhập tên sản phẩm--">
                        </div>
                        <label for="inlineinput" class="col-form-label">Lọc theo danh mục</label>
                        <div class="pl-2 pr-3">
                            <select class="form-control input-square" id="squareSelect" name='categoryId'>
                                <option value=''>(Không chọn)</option>
                                <?php foreach ($data['categoryList'] as $value) { ?>
                                    <option value='<?= $value['id'] ?>' <?=@($value['id']==$_GET['categoryId']?'selected':'')?>>
                                        <?= str_repeat('─', $value['dept']) . str_repeat(' ', $value['dept']); ?><?= $value['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="pl-2">
                            <button type="submit" class="btn btn-success">Lọc</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php if (count($data['productList'])>0) { ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">STT</th>
                            <th style="width: 30%">Tên sản phẩm</th>
                            <th style="width: 15%">Mô tả</th>
                            <th style="width: 10%">Giá</th>
                            <th style="width: 15%">Danh mục</th>
                            <th>Hình ảnh</th>
                            <th class='text-center' style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($data['productList']); $i++) { ?>
                            <tr>
                                <th scope="row" class='text-center'><?= 1 + $i + $data['itemPerPage'] * ($data['page'] - 1) ?></th>
                                <td><?= $data['productList'][$i]['name'] ?></td>
                                <td><?= $data['productList'][$i]['description'] ?></td>
                                <td><?= number_format($data['productList'][$i]['price']) ?> đ</td>
                                <td><?= $data['productList'][$i]['catName'] ?></td>
                                <td><?= $data['productList'][$i]['thumbnail_url'] ?></td>
                                <td class="text-center">
                                    <a href='?action=edit&id=<?= $data['productList'][$i]['id'] ?>' class="btn btn-success text-white btn-sm"><i class="la la-edit"></i></a>
                                    <a href='?action=delete&id=<?= $data['productList'][$i]['id'] ?>' class="btn btn-danger text-white btn-sm"><i class="la la-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
                <p class="text-danger">Không tìm thấy sản phẩm nào...</p>
            <?php } ?>
        </div>
        <div class="card-footer">
            <ul class="pagination pg-primary">
                <!-- <?php if ($data['page'] > 1) { //Nếu trang hiện tại là trang đầu tiên thì ẩn Prev đi
                        ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Trang trước</span>
                    </a>
                </li>
                <?php } ?> -->

                <?php
                for ($k = 1; $k < $data['totalPages']; $k++) {
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
        </div>
    </div>
</div>