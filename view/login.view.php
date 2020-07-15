<?php
include_once('./view/layout/breadcrumb.php');
?>
<div class="container">
    <!-- Form Đăng nhập -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Đăng nhập</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tên đăng nhập" name="username" type="text" value="<?=@$data['username']?>" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="" required>
                            </div>
                            <!-- <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"> Ghi nhớ thông tin đăng nhập
                                </label>
                            </div> -->
                            <?=@$data['notification']?>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Đăng nhập">
                        </fieldset>
                    </form>
                    <div class="mt-2">
                        <a href="register.php">Bạn chưa là thành viên? Click vào đây để đăng ký</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>