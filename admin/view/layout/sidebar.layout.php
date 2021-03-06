<div class="sidebar">
	<div class="scrollbar-inner sidebar-wrapper">
		<div class="user">
			<div class="photo">
				<img src="assets/img/profile.jpg">
			</div>
			<div class="info">
				<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
					<span>
						Thiện Nguyễn
						<span class="user-level">Quản trị viên</span>
						<span class="caret"></span>
					</span>
				</a>
				<div class="clearfix"></div>

				<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
					<ul class="nav">
						<li>
							<a href="#profile">
								<span class="link-collapse">My Profile</span>
							</a>
						</li>
						<li>
							<a href="#edit">
								<span class="link-collapse">Edit Profile</span>
							</a>
						</li>
						<li>
							<a href="#settings">
								<span class="link-collapse">Settings</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	
		<ul class="nav">
			<li class="nav-item <?php echo $curPage=='index'?'active':'' ?>">
				<a href="index.php">
					<i class="la la-dashboard"></i>
					<p>Tổng quan</p>
					<span class="badge badge-count">5</span>
				</a>
			</li>
			<li class="nav-item <?php echo $curPage=='categories'?'active':'' ?>">
				<a href="categories.php">
					<i class="la la-table"></i>
					<p>Danh mục</p>
					<span class="badge badge-count"><?=$data['global']['numberOfCategories']?></span>
				</a>
			</li>
			<li class="nav-item <?php echo $curPage=='products'?'active':'' ?>">
				<a href="products.php">
					<i class="la la-keyboard-o"></i>
					<p>Sản phẩm</p>
					<span class="badge badge-count"><?=$data['global']['numberOfProducts']?></span>
				</a>
			</li>
			<li class="nav-item <?php echo $curPage=='posts'?'active':'' ?>">
				<a href="posts.php">
					<i class="la la-th"></i>
					<p>Bài viết</p>
					<span class="badge badge-count"><?=$data['global']['numberOfPosts']?></span>
				</a>
			</li>
		</ul>
	</div>
</div>
