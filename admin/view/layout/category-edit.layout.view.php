<div class="container-fluid">
    <h4 class="page-title">Quản lý danh mục</h4>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Chỉnh sửa danh mục</div>
        </div>
        <form action="" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="squareInput">Tên danh mục</label>
                            <input value='<?= $data['category']['name'] ?>' type="text"
                                class="form-control input-square" id="squareInput" placeholder="Nhập tên danh mục"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="squareSelect">Danh mục cha <em>(không được phép thay đổi)</em></label>
                            <select class="form-control input-square" id="squareSelect" disabled name='categoryId'>
                                <option>(Không có danh mục cha)</option>
                                <?php foreach ($data['allCategories'] as $value) { ?>
                                <option value='<?= $value['id'] ?>'
                                    <?= $value['id'] == $data['category']['parentId'] ? 'selected' : '' ?>>
                                    <?= str_repeat('─', $value['dept']) . str_repeat(' ', $value['dept']); ?><?= $value['name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value=""
                                    <?= $data['category']['isFrontPage'] == 'Y' ? 'checked' : '' ?>>
                                <span class="form-check-sign">Hiển thị trên trang chủ</span>
                            </label>
                            <br>
                            <?php if ($data['category']['url_img'] != null || $data['category']['url_img'] != '') { ?>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-sign">Xoá ảnh thư mục hiện tại</span>
                            </label>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="pl-2" id="wrapper">
                            <span class="form-check-sign">Chọn ảnh cho danh mục (khi cần hiển thị trên trang chủ)</span>
                            <br>
                            <input id="fileUpload" type="file" multiple />
                            <br />
                            <div class="my-3 image-holder1" id="image-holder">
                                <img class="thumb-image" src="../img/categories/<?= $data['category']['url_img'] ?>"
                                    alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-action d-flex justify-content-end">
                <button type="submit" class="btn btn-success mx-1"><i class="la la-save"></i>
                    Lưu</button>
                <a href='categories.php' class="btn btn-danger mx-1"><i class="la la-times"></i> Huỷ</a>
            </div>
        </form>
    </div>
</div>