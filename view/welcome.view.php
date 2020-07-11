<div class="container">
    <!-- Form Đăng nhập -->
    <div class="card">
             <div class="card-body text-center"> <img src="./img/skin/chucmung.png">
                 <h4>Chào mừng!</h4>
                 <p>Chào mừng <?=$data['title']?> <strong><?=$data['name']?></strong></p>
                 <a href="index.php" class="btn btn-primary">Trang chủ</a>
                 <?php if (@(int)$data['adminPage'] == 1) { ?>
                    <a href="admin.php" class="btn btn-danger">Trang quản trị</a>
                 <?php }
                 ?>
             </div>
         </div>
</div>
</div>