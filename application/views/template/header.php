<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/global.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/header.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/content.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/category.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/detail.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css">
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.3.1.min.js" ></script>
</head>
<body onclick="hideResultSearch('show-search')">
	<script type="text/javascript">
		// Khi click chuột ra ngoài sẽ ẩn kết quả search
		// 2 hàm hideResultSearch(id) và toggleVisibility(id) đi đôi với nhau
		function hideResultSearch(id) {

			var key = document.getElementById("search_query").value;

			var e = document.getElementById(id);

			if(key.length == 0 || (key.length != 0 && e.style.display == 'block')){
				e.style.display = 'none';
			}
			else{
				e.style.display = 'block';
			}
		}

		// Ẩn kết quả search nếu input không có kí tự - ngược lại show ra kết quả nếu có kí tự nhập vào
		function toggleVisibility(id) {

			var key = document.getElementById("search_query").value;

			var e = document.getElementById(id);

			if(key.length == 0 || (key.length == 0 && e.style.display == 'block')){
				e.style.display = 'none';
			}
			else{
				e.style.display = 'block';
			}
		}

		function searchAjax(){
			var key = document.getElementById("search_query").value;
			key = key.trim();
			key = String(key);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("show-search").innerHTML =
					this.responseText;
				}
			};
			xmlhttp.open("GET", "<?php echo base_url(); ?>"+"index.php/C_Search/searchVideo/"+decodeURIComponent(key), true);
			xmlhttp.send();
		}
	</script>

	<script>
		$(document).ready(function(){
			$("#portrait").click(function(){
				$("#user-detail").fadeToggle("slowly");
			})
		})
	</script>
	<div id="wrapper">
		<div id="header" class="clearfix">
			<div class="wp-inner clearfix">
				<div id="logo" class="fl-left">
					<a href="<?php echo base_url(); ?>" class="fl-left">
						<img src="<?php echo base_url(); ?>images/logo1.png" alt="Logo" title="Home" class="logo-image">
					</a>
				</div>

				<div id="search" class="fl-left">
					<div class="clearfix" onkeyup="toggleVisibility('show-search')">
						<form id="form-search" action="<?php echo base_url(); ?>index.php/C_Search/searchListVideo" method="get" class="clearfix">
							<input id="search_query" name="search_query" type="text" class="textbox" placeholder="Tìm kiếm" onkeyup="searchAjax()">
							<input title="Search" value="" type="submit" class="button">
						</form>
					</div>
					<div id="show-search"></div>
				</div>

				<?php 
				if(!isset($_SESSION['username'])){
					?>
					<div id="menu-top-user" class="fl-right">	
						<ul class="fl-right clearfix">
							<li>
								<a href="<?php echo base_url(); ?>/index.php/view/signup" title="Đăng kí tài khoản"><p class="text-tran">Đăng kí<i class="user-plus"></i></p></a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>/index.php/view/login" title="Đăng nhập"><p class="text-tran">Đăng nhập<i class="user-login"></i></p></a>
							</li>
						</ul>
					</div>
					<?php }
					else{
						?>
						<div id="menu-user" class=" fl-right">
							<div id="share-video" class="fl-left">
								<a href="<?php echo base_url(); ?>/index.php/C_ShareVideo" title="Share Video"><p><i class="fa-share-alt"></i></p></a>
							</div>
							<div id="info-user" class="fl-right">
								<div id="user-portrait" class=" clearfix fl-right">
									<img id="portrait" class="image" src="<?php echo base_url(); ?>images/avatar-user/<?php echo $_SESSION['username'][0]['avatar']; ?>">
								</div>
								<div id="user-detail" class="text-center clearfix fl-right">
									<ul>
										<li><a href="<?php echo base_url(); ?>/index.php/C_Author_Videos/getVideoByAuthor/<?php echo str_replace(" ", "-",$_SESSION['username'][0]['author']); ?>"><?php echo $_SESSION['username'][0]['author']; ?></a></li>

										<li><a href="<?php echo base_url(); ?>/index.php/C_MyVideos/">Quản lý videos</a></li>

										<li><a href="<?php echo base_url(); ?>/index.php/C_Account/logout">Đăng xuất</a></li>
									</ul>
								</div>	
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</body>
	</html>