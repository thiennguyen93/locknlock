<div class="container my-3">
    <!-- FORM LIÊN HỆ ĐẶT Ở ĐÂY -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Liên hệ
                </div>
                <div class="card-body">
                    <form>
                        <?php
                            //Nếu user đã đăng nhập
                            // $userId = isset($_SESSION['user_info']['id'])
                            $userHoten = isset($_SESSION['user_info']['hoten']) ? $_SESSION['user_info']['hoten'] : '';
                            $userHotenReadOnly = $userHoten!=''?'disabled':'';
                        ?>
                        <input type="hidden" name="userId" value="">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input <?=$userHotenReadOnly?> type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nhập tên" required="" value="<?=$userHoten?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Địa chỉ email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Nhập địa chỉ email" required="">
                            <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không chia sẽ email của bạn với bất kỳ ai</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Nội dung</label>
                            <textarea class="form-control" id="message" rows="6" required=""></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Gửi</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Địa chỉ</div>
                <div class="card-body">
                    <p>Công ty Thiện Nguyễn</p>
                    <p>Linh Trung, Thủ Đức, TPHCM</p>
                    <p>Web: www.thiennguyenpro.com</p>
                    <p>Email: info@thiennguyenpro.com</p>
                    <p>Điện thoại: +84 169 544 3490</p>

                </div>

            </div>
        </div>
    </div>
</div>