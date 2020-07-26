<div class="container-fluid">
    <h4 class="page-title">Quản lý danh mục</h4>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Chỉnh sửa danh mục</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="squareInput">Tên danh mục</label>
                        <input value='<?= $data['category']['name'] ?>' type="text" class="form-control input-square" id="squareInput" placeholder="Nhập tên danh mục" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="squareSelect">Danh mục cha</label>
                        <select class="form-control input-square" id="squareSelect" disabled>
                            <option>(Không có danh mục cha)</option>
                            <?php foreach ($data['allCategories'] as $value) { ?>
                                <option value='<?= $value['id'] ?>' <?= $value['id'] == $data['category']['parentId'] ? 'selected' : '' ?>>
                                    <?= str_repeat('─', $value['dept']) . str_repeat(' ', $value['dept']); ?><?= $value['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <a href="categories.php">Trở về</a>
        </div>
    </div>
</div>