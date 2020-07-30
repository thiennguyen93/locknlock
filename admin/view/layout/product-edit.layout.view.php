<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="container-fluid">
    <h4 class="page-title">Quản lý sản phẩm</h4>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Chỉnh sửa sản phẩm</div>
        </div>
        <form action="" method="post">
        <div class="card-body">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <div class="pl-2" id="wrapper">
                    <span class="form-check-sign">Hình ảnh sản phẩm</span>
                    <br>
                    <input id="fileUpload" type="file" multiple />
                    <br />
                    <div class="my-3" id="image-holder">
                        <img class="thumb-image" src="../img/products/<?= $data['product']['thumbnail_url'] ?>" alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-sm-12">
                <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="squareInput">Tên sản phẩm</label>
                                <input value='<?= $data['product']['name'] ?>' type="text" class="form-control input-square" id="squareInput" placeholder="Nhập tên danh mục" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="squareSelect">Danh mục cha</label>
                                <select class="form-control input-square" id="squareSelect">
                                    <option>(Không có danh mục cha)</option>
                                    <?php foreach ($data['categoryList'] as $value) { ?>
                                        <option value='<?= $value['id'] ?>' <?= $value['id'] == $data['product']['categoryId'] ? 'selected' : '' ?>>
                                            <?= str_repeat('─', $value['dept']) . str_repeat(' ', $value['dept']); ?><?= $value['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="squareInput">Mô tả sản phẩm</label>
                                <input value='<?= $data['product']['description'] ?>' type="text" class="form-control input-square" id="squareInput" placeholder="Nhập tên danh mục" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="squareInput">Giá</label>
                                <input value='<?= $data['product']['price'] ?>' type="number" class="form-control input-square" id="squareInput" placeholder="Nhập tên danh mục" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postContentInput">Bài viết</label>
                        <textarea name="editor1" id='postContentInput'>
                            <?=$data['post'] == null?'<h1>Thêm bài viết mới giới thiệu về sản phẩm</h1>':$data['post']['content']?>
                        </textarea>
                    </div>
                    
                    
            </div>
        </div>
                    <div class="card-action d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mx-1"><i class="la la-save"></i> Lưu</button>
                        <a href='products.php' class="btn btn-danger mx-1"><i class="la la-times"></i> Huỷ</a>
                    </div>
            
               
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
