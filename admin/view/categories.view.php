<div class="container-fluid">
    <h4 class="page-title">Quản lý danh mục</h4>
    <?php
    // var_dump($data['allCategories']);


    //Tạo ra danh sách các danh mục       

    ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Bảng chi tiết danh mục sản phẩm<a href="categories.php?action=add" class="btn btn-primary btn-border btn-round float-right btn-sm"><i class="la la-plus"></i> Thêm danh mục</a></div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"  style="width:2%">STT</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col" class="text-center">Hiển thị ở Trang chủ</th>
                        <th scope="col" class="text-center" style="width:150px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0; foreach ($data['allCategories'] as $key => $value) { $stt++?>
                        <tr>
                            <td>
                                <?=$stt?>
                            </td>
                            <td>
                                <?= str_repeat('─', $value['dept']); ?>
                                <?= ' ' . $value['dept'] == 0 ? '<strong>' . $value['name'] . '</strong>' : $value['name'] ?>
                            </td>
                            <td class="text-center">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" <?=$value['isFrontPage'] == 'Y'?'checked':''?>>
                                    <span class="form-check-sign"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <a href='?action=edit&id=<?= $value['id'] ?>' class="btn btn-success text-white btn-sm"><i class="la la-edit"></i></a>
                                <a href='?action=delete&id=<?= $value['id'] ?>' class="btn btn-danger text-white btn-sm"><i class="la la-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>