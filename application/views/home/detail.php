<?php 
// list video duoc chon
$video_special = $loadvideodetail['videodetail'];
 	// array_unshift($data[] ,$video_special['video_id']);
	// array_splice($data[], 0, 3);

// Nhet id cua video vao session phuc vu tra cuu lich su xem
$_SESSION['video_id'][$video_special[0]['video_id']] = $video_special[0]['video_id'];


//function to get the current post URL of the page
function current_page_url(){
	$page_url   = 'http';
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
		$page_url .= 's';
	}
return $page_url.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $video_special[0]['title'];?></title>
	<meta property=”fb:app_id” content="232930040736977" />
	<meta property="fb:admins" content="100005489869339"/>
	<!-- load focus -->
	<script>
		window.onload = function () {
			document.getElementById("post-image-cover").focus();
		};
	</script>
</head>

<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=232930040736977&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body>
	<div id="wrapper">
		<div id="wr-content" class="wp-inner clearfix">
			<div id="path-category" class="clearfix">

			</div>

			<div id="content" class="fl-left clearfix">

				<div id="post-title clearfix">
					<h1 style="font-size: 26px; line-height: 33px; padding: 30px 0px; font-weight: bold;"><?php echo $video_special[0]['title'];?></h1>
				</div>
				<div id="post-image-cover" class="clearfix">
					<iframe id="video" class="image"  src="<?php echo $video_special[0]['link']; ?>?rel=0&autoplay=1&modestbranding=0&mute=0&showinfo=0" allow="autoplay; fullscreen"></iframe>
				</div>

				<div id="post-content-detail" class="clearfix">
					<div class="fl-left">
						<p id="views"> <?php echo $video_special[0]['views']; ?> lượt xem </p>	
					</div>
					<div class="fl-right">
						<p id="signature">Đăng bởi : <a href="<?php echo base_url(); ?>index.php/video/author/<?php echo str_replace(" ", "-", $video_special[0]['author']); ?>" style="color: red;"><?php echo $video_special[0]['author']; ?></a>
						</p>
					</div>
					<div class="clearfix">
						<p><?php echo $video_special[0]['descriptions']; ?></p>
					</div>
				</div>


				<div class="fb-comments clearfix" data-href="<?php current_page_url(); ?>" data-width="800" data-numposts="10" style="padding-bottom: 30px;">
				</div>

				<div id="interested" class="clearfix">
					<div id="interested-title">
						<p class="text-tran">video quan tâm</p>
					</div>

					<div id="interested-post">
						<?php 
						foreach($listvideowatched['videowatched'] as $video){
							?>
							<div class="sigle-post fl-left">
								<a href="<?php echo base_url(); ?>index.php/view/video/<?php echo $video['video_id']; ?>" title="<?php echo $video['title']; ?>">
									<div class="interested-post-image clearfix">
										<div class="mask-suggest-content">
											<div class="vertical-align">
												<p class="text-center"></p>
											</div>
										</div>
										<img src="<?php echo $video['image']; ?>" class="image">
										<span><?php echo $video['limit_time']; ?></span>
									</div>
									<div class="interested-post-title clearfix">
										<p><?php echo substr($video['title'], 0, 65);?>...</p> 
									</div>
								</a>
							</div>
							<?php 
						} ?>

					</div>
				</div>
			</div>

			<div id="sidebar" class="fl-right">
				<div id="advertising" class="clearfix">
					<a href="">
						<img src="<?php echo base_url(); ?>images/advertisment.png" alt="">
					</a>
				</div>

				<div id="most-read">
					<div id="suggest-title">
						<a class="text-tran" href="">Có thể bạn chưa xem</a>
					</div>

					<div id="widget-content" class="fl-right">
						<ul class="list-post">
							<?php foreach ($listsuggestvideos['suggestvideos'] as $video) 

							{ ?>
								<li>
									<a href="
									<?php echo base_url(); ?>index.php/view/video/<?php echo $video['video_id']; ?> ">
									<div class="fl-left list-post-image">
										<div class="mask-suggest-content">
											<div class="vertical-align">
												<p class="text-center"></p>
											</div>
										</div>
										<img src="<?php echo $video['image']; ?>" alt="" class="image">
										<span><?php echo $video['limit_time']; ?></span>
									</div>
									<div class="fl-right list-post-title">
										<h2><?php echo substr($video['title'], 0, 65);?>...</h2>
									</div>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>

				<div id="advertising" class="clearfix">
					<a href="">
						<img src="images/advertisment.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>	
</div>
</body>

</html>