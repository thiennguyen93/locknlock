<div class="container-fluid">
    <h4 class="page-title">Quản lý danh mục</h4>
    <div class="card">
        <div class="card-header">
            <div class="card-title"><?=$data['mode']=='add'?'Thêm danh mục':'Chỉnh sửa danh mục'?></div>
        </div>
        <form action="categories.php?action=save" method="post" enctype='multipart/form-data'>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <input type="hidden" name="id" value='<?=$data['category']['id'] ?>'>
                        <div class="form-group">
                            <label for="squareInput">Tên danh mục</label>
                            <input name='name' value='<?= $data['category']['name'] ?>' type="text"
                                class="form-control input-square" id="squareInput" placeholder="Nhập tên danh mục"
                                required>
                        </div>
                        <div class="form-group">Mô tả</label>
                            <input name='description' value='<?= $data['category']['description'] ?>' type="text"
                                class="form-control input-square" id="squareInput" placeholder="Nhập tên danh mục"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="squareSelect">Danh mục cha <em><?=$data['mode']=='add'?'':'(không được phép thay đổi)'?></em></label>
                            <select name='categoryId' class="form-control input-square" id="squareSelect" <?=$data['mode']=='add'?'':'disabled'?> name='categoryId'>
                                <option value=''>(Không có danh mục cha)</option>
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
                                <input  name='isFrontPage' class="form-check-input" type="checkbox" value="Y"
                                    <?= $data['category']['isFrontPage'] == 'Y' ? 'checked' : '' ?>>
                                <span class="form-check-sign">Hiển thị trên trang chủ</span>
                            </label>
                            <br>
                            <!-- <?php if ($data['category']['url_img'] != null || $data['category']['url_img'] != '') { ?>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-sign">Xoá ảnh thư mục hiện tại</span>
                            </label>
                            <?php } ?> -->
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="pl-2" id="wrapper">
                            <span class="form-check-sign">Chọn ảnh cho danh mục (khi cần hiển thị trên trang chủ)</span>
                            <br>
                            <input name='photo' id="fileUpload" type="file" multiple />
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