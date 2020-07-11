<?php
@session_start();
?>

<nav class="nav justify-content-end">
    <?php if (!isset($_SESSION['user_info'])) { ?>
        <a class="nav-link" href="login.php">Đăng nhập</a>
        <a class="nav-link" href="register.php">Gia nhập thành viên</a>
    <?php } else { ?>
        <a class="nav-link" href="user.php">Xin chào, <strong><?=$_SESSION['user_info']['hoten'] ?></strong></a>
        <a class="nav-link" href="logout.php">Đăng xuất</a>
    <?php } ?>
    <a class="nav-link" href="#">Chăm sóc cách hàng</a>
</nav>