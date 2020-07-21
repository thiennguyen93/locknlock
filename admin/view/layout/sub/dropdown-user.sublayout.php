<?php
    $profile_img = "upload/profile_img/".$_SESSION['user_info']['username'].".jpg"
?>

<li class="nav-item dropdown">
<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="<?=$profile_img?>" alt="user-img" width="36" class="img-circle"><span ><?=$_SESSION['user_info']['hoten']?></span></span> </a>
<ul class="dropdown-menu dropdown-user">
    <li>
        <div class="user-box">
            <div class="u-img"><img src="<?=$profile_img?>" alt="user"></div>
            <div class="u-text">
                <h4>Quản trị viên</h4>
                <p class="text-muted"><?=$_SESSION['user_info']['email']?></p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
            </div>
        </li>
        <!-- <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
        <a class="dropdown-item" href="#"></i> My Balance</a>
        <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
        <div class="dropdown-divider"></div> -->
        <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a>
    </ul>
    <!-- /.dropdown-user -->
</li>