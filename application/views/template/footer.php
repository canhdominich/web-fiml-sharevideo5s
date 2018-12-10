<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vietsoz</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/global.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/footer.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/copyright.css">
</head>
<body>
	<div id="wrapper">
		<div id="footer" class="wp-inner clearfix">
			<div class="wp-inner">
				<div id="about" class="fl-left">
					<div class="footer-title clearfix"><p class="text-tran">Về chúng tôi</p></div>
					<div id="text-about" class="clearfix">
						<p class="text-justify">
							Tất cả video/clip được các thành viên đăng tải/chia sẻ. Nếu vi phạm bản quyền đúng theo phản hồi của tác giả cũng như nhà sản xuất, chúng tôi sẽ lập tức gỡ bỏ những video/clip vi phạm cũng như khóa tài khoản vĩnh viễn đối với thành viên đăng tải/chia sẻ sai quy định của hệ thống.
							ShareVideo5s rất vui nếu được làm hài lòng bạn!
						</p>
					</div>
				</div>

				<div id="category" class="fl-left">
					<div class="footer-title clearfix"><p class="text-tran">Danh mục</p></div>
					<div id="text-category" class="clearfix">
						<ul>
							<?php foreach ($menu['listmenu'] as $menu_special) {
								?>
								<!-- Ham strtolower chuyen doi chu hoa ve chu thuong. Tiep do la ham ucwords chuyen chu cai dau cua moi tu ve dang chu hoa -->
								<li>
									<i class="list"></i>
									<a href="<?php echo base_url(); ?>index.php/view/category/<?php echo $menu_special['category_name']; ?>">
										<?php echo str_replace("-", " ", $menu_special['category_name']); ?>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>

				<div id="contact" class="fl-left">
					<div class="footer-title clearfix"><p class="text-tran">Liên hệ</p></div>
					<div id="text-contact" class="clearfix">
						<p><i class="tel"></i>Hotline: 0981 248 920</p>
						<p><i class="email"></i>Support: gieomamsusong@gmail.com</p>
						<p><i class="address"></i>Phạm Hùng, Keangnam, Nam Từ Liêm, Nam Từ Liêm Hà Nội</p>
					</div>
				</div>

				<div id="fanpage" class="fl-right">
					<div class="footer-title clearfix"><p class="text-tran">fanpage</p></div>

					<div id="text-fanpage" class="clearfix">
						<iframe class="video" src="https://www.youtube.com/embed/VP6edETybPw?&rel=0&modestbranding=1&mute=0&autoplay=0&showinfo=0&fs=0"
						frameborder="0">
					</iframe>
				</div>
			</div>
		</div>

		<div id="copyright" class="text-center clearfix">
			<p >
				<i class="icon-copyright"></i>Copyright @2018 ShareVideo5s.com. Bản quyền website thuộc về  DDC (Design Degital Company)
			</p>
		</div>
	</div>
</body>
</html>