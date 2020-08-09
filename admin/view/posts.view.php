<div class="container-fluid">
    <h4 class="page-title">Quản lý bài viết</h4>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Các bài viết <a href="posts.php?action=add" class="btn btn-primary btn-border btn-round float-right btn-sm"><i class="la la-plus"></i> Thêm bài viết</a></div>
        </div>
        <div class="card-body">
            <div class="card-sub">
                <form action="" method="get">
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-form-label">Tiêu đề bài viết</label>
                        <div class="pl-2 pr-3">
                            <input value='<?=@$_GET['keyword']?>' name='keyword' type="text" class="form-control input-full" id="inlineinput" placeholder="--Nhập tiêu đề bài viết--">
                        </div>
                        <label for="inlineinput" class="col-form-label">Tác giả</label>
                        <div class="pl-2 pr-3">
                            <select class="form-control input-square" id="squareSelect" name='authorId'>
                                <option value=''>(Không chọn)</option>
                                <?php foreach ($data['authorList'] as $value) { ?>
                                    <option value='<?= $value['id'] ?>' <?=@($value['id']==$_GET['authorId']?'selected':'')?>>
                                        <?= $value['hoten']?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="inlineinput" class="col-form-label">Hiển thị mỗi trang</label>
                        <div class="pl-2 pr-3">
                            <select class="form-control input-square" id="squareSelect" name='itemsPerPage'>
                                <?php 
                                    $defaultItemsPerPage = isset($_GET['itemsPerPage'])?$_GET['itemsPerPage']:3;
                                    $defaultItemsPerPage = $defaultItemsPerPage > 10?10:$defaultItemsPerPage;
                                for ($j=1;$j<=10;$j++) { ?>
                                    <option value='<?=$j?>' <?=@($j==$defaultItemsPerPage?'selected':'')?>>
                                        <?=$j?> bài viết
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="pl-2">
                            <button type="submit" class="btn btn-success">Lọc</button>
                            <a href="posts.php" class="btn btn-danger">Xóa bộ lọc</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="notification">
                <?php $notification = isset($_GET['notification'])?$_GET['notification']:''; 
                        $notificationContent = isset($_SESSION['notification'])?$_SESSION['notification']:'';
                    if ($notification == 'show') {
                        echo $notificationContent;
                    } 
                    unset($notificationContent);
                    unset($_SESSION['notification']);
                ?>
            </div>
            <?php if (count($data['postList'])>0) { ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class='text-center' style="width: 5%">STT</th>
                            <th style="width: 30%">Tiêu đề</th>
                            <th style="width: 15%">Tác giả</th>
                            <th style="width: 10%">Ghi chú</th>
                            <th class='text-center' style="width: 10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($data['postList']); $i++) { ?>
                            <tr>
                                <th scope="row" class='text-center'><?= 1 + $i + $data['itemPerPage'] * ($data['page'] - 1) ?></th>
                                <td><?= $data['postList'][$i]['title']?></td>
                                <td><?= $data['postList'][$i]['authorName'] ?></td>
                                <td><?= $data['postList'][$i]['description'] ?></td>
                                <td class="text-center">
                                    <a href='?action=edit&id=<?= $data['postList'][$i]['id'] ?>&return=<?=urlencode('&page='.$data['page'].$data['link'])?>' class="btn btn-success text-white btn-sm"><i class="la la-edit"></i></a>
                                    <button data-return='<?=urlencode('&page='.$data['page'].$data['link'])?>' data-action='delete_post' data-item="<?=base64_encode(json_encode($data['postList'][$i]))?>" type="button" data-toggle="modal" data-target="#modalUpdate" data-whatever="post" href='?action=delete&id=<?= $data['postList'][$i]['id'] ?>' class="btn btn-danger text-white btn-sm"><i class="la la-trash"></i></button>
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
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
        <?php if ($data['totalPages'] >1) { ?>
        <div class="card-footer">
            <ul class="pagination pg-primary">
                <li class="page-item">
                    <a class="page-link" href="<?=$data['page']<=1?'#':'?page='.($data['page']-1).$data['link']?>" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Trang trước</span>
                    </a>
                </li>

                <?php
                $pageNeigbor = 1;
                $start = ($data['page'] - $pageNeigbor) <= 1? 1:($data['page'] - $pageNeigbor);
                $start = ($data['page'] == $data['totalPages'])?($data['totalPages']-$pageNeigbor):$start;
                $end = ($data['page'] > 1 && $data['page'] < $data['totalPages'])? ($data['page'] + $pageNeigbor):($pageNeigbor*2+1);
                $end = ($data['page'] >= $data['totalPages'])? $data['totalPages']:$end;
                for ($k=$start; $k <= $end ; $k++) {
                ?>
                    <?php if ($k>=1 and $k <= $data['totalPages']) { ?>
                    <li class="page-item <?= $data['page'] == $k ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $k ?><?=$data['link']?>"><?= $k ?></a></li>
                    <?php } ?>
                <?php } ?>

                <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                <?php if ($data['page'] < $data['totalPages']) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $data['page']+1 ?><?=$data['link']?>" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Tiếp theo</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>

