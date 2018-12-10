<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ShareVideo5s</title>
</head>
<body>
	<div id="wrapper">
		<div id="wr-content" class="wp-inner clearfix">
			<div id="content" class="fl-left">
				<div id="wp-cover-advertising" class="clearfix">
					<?php
					foreach($listallslide['allslide'] as $slide){

						?>
						<div class="advertising slides fade">
							<a href="<?php echo $slide['link']; ?>" target="_blank">
								<img class="image" src="<?php echo base_url(); ?>images/advertisement/<?php echo $slide['image']; ?>">
								<div class="text">
									<!-- <?php echo $slide['descriptions']; ?> -->
								</div>
							</a>
						</div>
						<?php
					}
					?>
				</div>

				<?php foreach ($listvideogeybycategory['videogeybycategory'] as $category => $videobycategory) 
				{ ?>
					<div id="wp-feature" class="clearfix">
						<div class="category clearfix">
							<a href="<?php echo base_url(); ?>index.php/view/category/<?php echo $category; ?>">
								<div class="category-detail">
									<p class="text-tran text-center">
										<?php echo str_replace("-", " ", $category); ?>
									</p>
								</div>
							</a>
						</div>

						<div>
							<?php foreach ($videobycategory as $video) 

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
												<span><?php echo $video['date']; ?> || <a class="author" href="<?php echo base_url(); ?>index.php/video/author/<?php echo str_replace(" ", "-", $video['author']); ?>"><?php echo $video['author']; ?></a>
												</span>
												<br/> 
												<span><?php echo $video['views']; ?> Views</span>
											</div>
										</a>
									</div>
									<?php }?>
								</div>	
							</div>
							<?php } ?>

							<?php if(isset($listallslide['allslide'])){
								$i = rand(0,5);
								?>
								<div id="wp-cover-advertising" class="clearfix">
									<div class="advertising">
										<a href="<?php echo $listallslide['allslide'][$i]['link']; ?>" target="_blank">
											<img src="<?php echo base_url(); ?>images/advertisement/<?php echo $listallslide['allslide'][$i]['image']; ?>" alt="" class="image">
										</a>
									</div>
								</div>
								<?php
							} ?>

							<?php 
							if(!empty($listvideofollow['videofollow'])){
								?>
								<div id="wp-feature" class="clearfix">
									<div class="category clearfix">
										<a href="">
											<div class="category-detail">
												<p class="text-tran text-center">
													Đề xuất
												</p>
											</div>
										</a>
									</div>

									<div>
										<?php 
										foreach ($listvideofollow['videofollow'] as $video) 

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
																<span><?php echo $video['date']; ?> || <a class="author" href="<?php echo base_url(); ?>index.php/video/author/<?php echo str_replace(" ", "-", $video['author']); ?>"><?php echo $video['author']; ?></a>
																</span>
																<br/> 
																<span><?php echo $video['views']; ?> Views</span>
															</div>
														</a>
													</div>
													<?php
												}
												?>
											</div>	

										</div>
										<?php
									}
									?>

								</div>

								<div id="sidebar" class="fl-right">
									<?php
									if(isset($listallslideone['allslideone'][0])){
										?>
										<div id="advertising-sidebar" class="clearfix">
											<a href="<?php echo $listallslideone['allslideone'][0]['link']; ?>">
												<img src="<?php echo base_url(); ?>images/advertisement/<?php echo $listallslideone['allslideone'][0]['image']; ?>" alt="" class="image">
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
									if(isset($listallslideone['allslideone'][1])){
										?>
										<div id="advertising-sidebar" class="clearfix">
											<a href="<?php echo $listallslideone['allslideone'][1]['link']; ?>">
												<img src="<?php echo base_url(); ?>images/advertisement/<?php echo $listallslideone['allslideone'][1]['image']; ?>" alt="" class="image">
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
										if(isset($listallslideone['allslideone'][2])){
											?>
											<div id="advertising-sidebar" class="clearfix">
												<a href="<?php echo $listallslideone['allslideone'][2]['link']; ?>">
													<img src="<?php echo base_url(); ?>images/advertisement/<?php echo $listallslideone['allslideone'][2]['image']; ?>" alt="" class="image">
												</a>
											</div>
											<?php
										}
										?>

									</div>
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
				dots[i].className = dots[i].className.replace(" active", "").slowly();
			}
		slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 5000); // Change image every 2 seconds
	}
</script>
</body>
</html>
