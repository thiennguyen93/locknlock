<?php
include_once('./view/layout/breadcrumb.php');
?>
<div class="container">


    <!-- Form Đăng nhập -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Gia nhập thành viên</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Họ tên" name="fullname" type="text" value="" required>
                            </div>
                            <div class="form-group">
                                <input id="email" class="form-control" placeholder="Email" name="email" type="email" value="" required>
                            </div>
                            <div id="resultEmail">
                            </div>
                            <div class="form-group">
                                <input id="username" class="form-control" placeholder="Tên đăng nhập" name="username" type="text" value="<?=@$data['username']?>" required>
                            </div>
                            <div id="result">
                            </div>
                            <div class="form-group">
                                <input id="password" class="form-control" placeholder="Mật khẩu" name="password" type="password" value="" required>
                            </div>
                            <div class="form-group">
                                <input id="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu" name="confirm_password" type="password" value="" required>
                            </div>
                            <?=@$data['notification']?>
                            <span id='message'></span>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Đăng ký" id="btn_reg">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");
var username = document.getElementById("username");
var email = document.getElementById("email");

function checkUsernameAvailbility() {
    console.log('test','ajax.php?action=check&username=' + username.value);
    // ajax.php?action=check&username=admin
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText>0) {
                username.setCustomValidity("Tên đăng nhập này đã được sử dụng!");
                document.getElementById('result').innerHTML = "<div class='alert alert-warning'><strong>Chú ý!</strong> Tên đăng nhập này đã được sử dụng!</div>";
            } else {
                username.setCustomValidity('');
                document.getElementById('result').innerHTML = '';
            }
        }
    }
    //cau hinh request
    xhttp.open('GET','ajax.php?action=check&username=' + username.value,true);
    //gui request
    xhttp.send();
}

function checkEmailAvailbility() {
    console.log('test','ajax.php?action=checkEmail&email=' + email.value);
    // ajax.php?action=check&username=admin
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("result", this.responseText);
            if (this.responseText>0) {
                email.setCustomValidity("Email này đã được sử dụng!");
                document.getElementById('resultEmail').innerHTML = "<div class='alert alert-warning'><strong>Chú ý!</strong> Email này đã được sử dụng!</div>";
            } else {
                email.setCustomValidity('');
                document.getElementById('resultEmail').innerHTML = '';
            }
        }
    }
    //cau hinh request
    xhttp.open('GET','ajax.php?action=checkEmail&email=' + email.value,true);
    //gui request
    xhttp.send();
}


username.onkeyup = checkUsernameAvailbility;
username.onfocusout =  checkUsernameAvailbility;

email.onkeyup = checkEmailAvailbility;
email.onfocusout =  checkEmailAvailbility;

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Mật khẩu nhập lại không chính xác");
  } else {
    confirm_password.setCustomValidity('');
  }
}



password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


</script>