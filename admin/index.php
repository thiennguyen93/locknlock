<?php
	session_start();
	$curPage = 'index';
?>

<?php
$controller = 'categories';
include_once './lib/database.php';
include_once 'router.php';
?>


<?php
	if (isset($_SESSION['user_info'])==false || $_SESSION['user_info']['adminPage'] != 1) {
		header('Location: login.php');
		exit();
	}
?>


<!DOCTYPE html>
<html>
	<?php
		include_once("./view/layout/sub/head.sublayout.php");
	?>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- LOGO HEADER -->
			<?php
				include_once("./view/layout/logo-header.layout.php");
			?>
			<!-- /LOGO HEADER -->
			<!-- TOP HEADER -->
			<?php
				include_once("./view/layout/top-header.layout.php");
			?>
			<!-- /TOP HEADER -->
			</div>
			<!-- SIDEBAR CONTENT -->
			<?php
				include_once("./view/layout/sidebar.layout.php");
			?>
			<!-- /SIDEBAR CONTENT -->
			<div class="main-panel">
				<div class="content">
					<!-- CONTENT -->
					<?php
					include_once("./view/dashboard.view.php")
					?>
					<!-- /CONTENT -->
				</div>
				<!-- FOOTER -->
				<?php
					include_once("./view/layout/footer.layout.php")
				?>
				<!-- /FOOTER -->
			</div>
		</div>
	</div>
<!-- MODAL -->
<?php
	include_once("./view/layout/modal.layout.php")
?>
<?php
	include_once("./view/layout/sub/endbody.sublayout.php")
?>

<!-- /MODAL -->
</body>
<?php
	include_once("./view/layout/scripts.layout.php")
?>
</html>