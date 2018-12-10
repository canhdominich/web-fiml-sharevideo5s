<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo str_replace("-", " ", $title['category_name']); ?></title>
</head>
<body>'
	<script>
		var countpage = 1;
		$(document).ready(function(){
			$("#view-more").click(function(){
				countpage = countpage + 1;
				parseInt(countpage);
				$.get("<?php echo base_url(); ?>"+"index.php/C_Pagination", {page: countpage, category_name : "<?php echo $title['category_name']; ?>" }, function(data){
					$("#wp-list-post").append(data);
				})
			})
		})
	</script>
	<div id="wrapper">
		<div id="wr-content" class="wp-inner clearfix">
			<div id="path-category" class="clearfix" style="font-weight: 600; color: #01a050;">
				<a href="<?php echo base_url(); ?>" title="Home"><i id="path-home"></i>| </a><a href="" id="path-category-name"><?php echo str_replace("-", " ", $title['category_name']); ?></a>
			</div>

			<div id="content" class="fl-left clearfix">
				<div id="wp-cover-advertising" class="clearfix">
					<?php
					foreach($listallslideten['allslideten'] as $slide){

						?>
						<div class="advertising slides fade">
							<a href="" target="_blank">
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
				
				<div id="wp-list-post" class="clearfix">
					<ul>
						<?php foreach ($listvideobycategory['videobycategory'] as $video) {
							
							?>
							<li>
								<a href="<?php echo base_url(); ?>index.php/view/video/<?php echo $video['video_id']; ?>" title="<?php echo $video['title']; ?>">
									<div>
										<div class="category-list-post-image fl-left">
											<div class="mask-suggest-content">
												<div class="vertical-align clearfix">
													<p class="text-center"></p>
												</div>
											</div>
											<img src="<?php echo $video['image']; ?>" alt="" class="video">
											<span><?php echo $video['limit_time'] ?></span>
										</div>

										<div class="category-list-post-detail fl-right">
											<div class="category-list-post-title clearfix">
												<h2 style="font-size: 20px; line-height: 27px;"><?php echo $video['title']; ?></h2>
											</div>
											<div class="clearfix">
												<span></span>
											</div>
											<div class="list-post-video-title text-justify">
												<br/>
												<span><?php echo $video['date']; ?> || <a href="<?php echo base_url(); ?>index.php/video/author/<?php echo str_replace(" ", "-", $video['author']); ?>" title="<?php echo $video['author']; ?>" class="author"><?php echo $video['author']; ?></a>
												</span>
												<br/> 
												<span><?php echo $video['views']; ?> Views</span>
											</div>
										</div>
									</div>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>

					<div id="wp-pagination" class="clearfix">
						<div>
							<div id="pagination-left" class="fl-left">
							</div>

							<div id="pagination-right" class="fl-right">
								<ul>
									<li class="current-page">
										<span >M</span>
									</li>
									<li class="current-page">
										<span >O</span>
									</li>
									<li class="current-page">
										<span >R</span>
									</li>
									<li class="current-page">
										<span >E</span>
									</li>
									<li id="view-more" class="current-page">
										<span ><i class="hand-point-up"></i></span>
									</li>
									<li class="current-page">
										<span >V</span>
									</li>
									<li class="current-page">
										<span >Ie</span>
									</li>
									<li class="current-page">
										<span >W</span>
									</li>
									<li class="current-page">
										<span >S</span>
									</li>
								</ul>
							</div>
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
							<a class="text-tran" href="">Clip ấn tượng</a>
						</div>

						<div id="widget-content" class="fl-right">
							<ul class="list-post">
								<?php foreach ($listmostviewvideos['mostviewvideos'] as $video) 

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
											<h2><?php echo substr($video['title'], 0, 65);?>...</h2>
										</div>
									</a>
								</li>
								<?php } ?>
							</ul>
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
								<a class="text-tran" href="">Có thể bạn quan tâm</a>
							</div>

							<div id="widget-content" class="fl-right">
								<ul class="list-post">
									<?php foreach ($listimpressivevideos['impressivevideos'] as $video) 

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
												<h2><?php echo substr($video['title'], 0, 65);?>...</h2>
											</div>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>				
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
