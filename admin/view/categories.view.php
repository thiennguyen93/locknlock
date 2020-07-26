<div class="container-fluid">
    <h4 class="page-title">Quản lý danh mục</h4>
    <?php
        // var_dump($data['allCategories']);
       

        //Tạo ra danh sách các danh mục       

    ?>
    <div class="card">
        <!-- <div class="card-header">
            <div class="card-title">Danh mục</div>
        </div> -->
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['allCategories'] as $key => $value) { ?>
                    <tr>
                        <td>
                        <?=str_repeat('─', $value['dept']); ?>
                        <?=' ' . $value['dept']==0?'<strong>'.$value['name'].'</strong>':$value['name']?>
                        </td>
                        <td><?=$value['description']?></td>
                        <td>
                        <a href='?action=edit&id=<?=$value['id']?>' class="btn btn-success text-white btn-sm"><i class="la la-edit"></i> Thay đổi</a>
                        <a href='?action=delete&id=<?=$value['id']?>' class="btn btn-danger text-white btn-sm"><i class="la la-trash"></i> Xóa</a>
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