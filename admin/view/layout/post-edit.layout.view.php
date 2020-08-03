<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="container-fluid">
<?php
// var_dump($data);
// exit;
?>
    <h4 class="page-title">Quản lý bài viết</h4>
    <div class="card">
        <div class="card-header">
            <div class="card-title"><?=$data['mode']=='add'?'Thêm bài viết mới':'Chỉnh sửa bài viết'?></div>
        </div>
        <form action="posts.php?action=save" method="post">
        <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <input type="hidden" name="id" value=<?=$data['post']['id'] ?>>
                            <input type="hidden" name="return" value=<?=isset($data['return'])?$data['return']:''?>>
                            <div class="form-group">
                                <label for="squareInput">Tiêu đề bài viết</label>
                                <input name='title' value='<?= $data['post']['title'] ?>' type="text" class="form-control input-square" id="squareInput" placeholder="Nhập tiêu đề bài viết" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                                <label for="squareInput">Ghi chú</label>
                                <input name='description' value='<?= $data['post']['description'] ?>' type="text" class="form-control input-square" id="squareInput" placeholder="Nhập ghi chú bài viết">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postContentInput">Bài viết</label>
                        <textarea name="editor1" id='postContentInput'>
                            <?=$data['post']['content'] == null?'<h1>Nội dung mẫu bài viết</h1>':$data['post']['content']?>
                        </textarea>
                    </div>
            </div>
        </div>
                    <div class="card-action d-flex justify-content-end">
                        <button type="submit" class="btn btn-success mx-1"><i class="la la-save"></i> Lưu</button>
                        <a href='posts.php<?=isset($data['return'])?('?'.$data['return']):''?>' class="btn btn-danger mx-1"><i class="la la-times"></i> Huỷ</a>
                    </div>
            
               
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'editor1', {
    language: 'vi'
});
</script>