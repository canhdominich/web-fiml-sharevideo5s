<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $listvideobyauthor['author']; ?></title>
</head>
<body>
	<div id="wrapper">
		<div id="wr-content" class="wp-inner clearfix">
			<div id="path-category" class="clearfix" style="font-weight: 600; color: #01a050; padding-top: 15px;">
				<a href="<?php echo base_url(); ?>" title="Home"><i id="path-home"></i>|| </a><a href="" id="path-category-name"><?php echo $listvideobyauthor['author']; ?></a>
			</div>
			<div id="content" class="fl-left">
				<div id="wp-cover-advertising" class="clearfix">
					<?php
					foreach($listallslideten['allslideten'] as $slide){

						?>
						<div class="advertising slides fade">
							<img class="image" src="<?php echo base_url(); ?>images/advertisement/<?php echo $slide['image']; ?>">
							<div class="text">
								<!-- <?php echo $slide['descriptions']; ?> -->
							</div>
						</div>
						<?php
					}
					?> 
				</div>

				<div id="wp-feature" class="clearfix">
					<?php
					if(isset($_SESSION['username'])){
						if($_SESSION['username'][0]['author'] == $listvideobyauthor['author']){
							?>
							<div class="category clearfix">
								<a href="">
									<div class="category-detail fl-left">
										<p class="text-tran text-center" style="font-size: 13px;">
											Video của tôi
										</p>
									</div>
								</a>
							</div>
							<?php
						}
						else{
							if($listvideobyauthor['checkfollow']){
								?>
								<div class="category clearfix">
									<a href="<?php echo base_url(); ?>index.php/C_Follow/deleteFollow/<?php echo $_SESSION['username'][0]['user_id']; ?>/<?php echo str_replace(" ", "-",$listvideobyauthor['author']); ?>">
										<div class="category-unfollow fl-left">
											<p class="text-tran text-center" style="font-size: 10px;">
												Bỏ theo dõi
											</p>
										</div>
									</a>
								</div>
								<?php
							}
							else{
								?>
								<div class="category clearfix">
									<a href="<?php echo base_url(); ?>index.php/C_Follow/addFollow/<?php echo $_SESSION['username'][0]['user_id']; ?>/<?php echo str_replace(" ", "-",$listvideobyauthor['author']); ?>">
										<div class="category-follow fl-right">
											<p class="text-tran text-center" style="font-size: 10px;">
												Theo dõi +
											</p>
										</div>
									</a>
								</div>
								<?php
							}
						}
					}
					else{
						?>
						<div class="category clearfix">
							<a href="<?php echo base_url(); ?>index.php/C_Account/login">
								<div class="category-detail fl-right">
									<p class="text-tran text-center" style="font-size: 10px;">
										Theo dõi +
									</p>
								</div>
							</a>
						</div>
						<?php
					}
					?>


					<div>
						<?php foreach ($listvideobyauthor['videobyauthor'] as $video)

						{ ?>
							<div id="video-one" class="widget-video fl-left">
								<a href="<?php echo base_url(); ?>index.php/view/video/<?php echo $video['video_id']; ?>" title="<?php echo $video['title']; ?>">
									<div class="list-post-video">
										<div class="mask-suggest-content">
											<div class="vertical-align clearfix">
												<p class="text-center"></p>
											</div>
										</div>
										<img src="<?php echo $video['image']; ?>" alt="" class="video">
										<span><?php echo $video['limit_time'] ?></span>
									</div>
									<div class="list-post-video-title text-justify">
										<span class="name">
											<?php 
											if(strlen($video['title']) > 80){
												echo substr($video['title'], 0, 80)."...";
											}
											else{
												echo $video['title'];
											}
											?>	
											<br/>
											<span><?php echo $video['date']; ?> || </span> <a class="author" href="<?php echo base_url(); ?>index.php/video/author/<?php echo str_replace(" ", "-",$video['author']); ?>"><?php echo $video['author']; ?></a></span><br/> 
											<span><?php echo $video['views']; ?> Views</span>
										</div>
									</a>
								</div>
								<?php }?>
							</div>	
						</div>
					</div>


					<div id="sidebar" class="fl-right">
						<?php
						if(isset($listallslideelevent['allslideelevent'][0])){
							?>
							<div id="advertising-sidebar" class="clearfix">
								<a href="<?php echo $listallslideelevent['allslideelevent'][0]['link']; ?>" target="_blank">
									<img src="<?php echo base_url(); ?>images/advertisement/<?php echo $listallslideelevent['allslideelevent'][0]['image']; ?>" alt="" class="image">
								</a>
							</div>
							<?php
						}
						?>

						<div id="most-read">
							<div id="suggest-title">
								<a class="text-tran" href="" >Clip mới hay nhất</a>
							</div>

							<div id="widget-content" class="fl-right">
								<ul class="list-post">
									<?php foreach ($listnewvideos['newvideos'] as $video) 

									{ ?>
										<li>
											<a href="
											<?php echo base_url(); ?>index.php/view/video/<?php echo $video['video_id']; ?> "  title="<?php echo $video['title']; ?>">
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
												<h2>
													<?php 
													if(strlen($video['title']) > 65){
														echo substr($video['title'], 0, 65)."...";
													}
													else{
														echo $video['title'];
													}
													?>
												</h2>
											</div>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>

						<?php
						if(isset($listallslideelevent['allslideelevent'][1])){
							?>
							<div id="advertising-sidebar" class="clearfix">
								<a href="<?php echo $listallslideelevent['allslideelevent'][1]['link']; ?>" target="_blank">
									<img src="<?php echo base_url(); ?>images/advertisement/<?php echo $listallslideelevent['allslideelevent'][1]['image']; ?>" alt="" class="image">
								</a>
							</div>
							<?php
						}
						?>

						<div id="most-read">
							<div id="suggest-title">
								<a class="text-tran" href="">Video xem nhiều nhất</a>
							</div>

							<div id="widget-content" class="fl-right">
								<ul class="list-post">
									<?php foreach ($listmostnewvideos['mostnewvideos'] as $video) 

									{ ?>
										<li>
											<a href="
											<?php echo base_url(); ?>index.php/view/video/<?php echo $video['video_id']; ?> " title="<?php echo $video['title']; ?>">
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
												<h2>
													<?php 
													if(strlen($video['title']) > 65){
														echo substr($video['title'], 0, 65)."...";
													}
													else{
														echo $video['title'];
													}
													?>
												</h2>
											</div>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>

							<?php
							if(isset($listallslideelevent['allslideelevent'][2])){
								?>
								<div id="advertising-sidebar" class="clearfix">
									<a href="<?php echo $listallslideelevent['allslideelevent'][2]['link']; ?>" target="_blank">
										<img src="<?php echo base_url(); ?>images/advertisement/<?php echo $listallslideelevent['allslideelevent'][2]['image']; ?>" alt="" class="image">
									</a>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>

				<script>
					var slideIndex = 0;
					showSlides();

					function showSlides() {
						var i;
						var slides = document.getElementsByClassName("slides");
						var dots = document.getElementsByClassName("dot");
						for (i = 0; i < slides.length; i++) {
							slides[i].style.display = "none";  
						}
						slideIndex++;
						if (slideIndex > slides.length) {slideIndex = 1}    
							for (i = 0; i < dots.length; i++) {
								dots[i].className = dots[i].className.replace(" active", "");
							}
							slides[slideIndex-1].style.display = "block";  
	    setTimeout(showSlides, 5000); // Change image every 2 seconds
	}
</script>
</body>
</html>
