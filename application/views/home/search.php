<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $resultlistvideo['key']; ?>-Vietsoz</title>
</head>
<body>
	<script>
		var countpage = 1;
		$(document).ready(function(){
			$("#view-more").click(function(){
				countpage = countpage + 1;
				parseInt(countpage);
				$.get("<?php echo base_url(); ?>"+"index.php/C_Search/searchVideoByName", {page: countpage, key : "<?php echo $resultlistvideo['key']; ?>" }, function(data){
					$("#wp-list-post").append(data);
				})
			})
		})
	</script>
	<div id="wrapper">
		<div id="wr-content" class="wp-inner clearfix">
			<div id="result-count-videos" class="clearfix">
				<p>Có <?php echo sizeof($resultlistvideo['listvideo']); ?> kết quả với từ khóa
					"<span style="color: black; font-size: 16px;"><?php echo $resultlistvideo['key']; ?></span>"</p>
					<hr>
				</div>

				<div id="content" class="fl-left clearfix">
					<div id="wp-list-post" class="clearfix">
						<ul>
							<?php $count = 0; ?>
							<?php foreach ($resultlistvideo['listvideo'] as $video) {
								$count = $count+1;
								if($count > 15){
									break;
								}
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
													<span><?php echo $video['date']; ?> || <a href="<?php echo base_url(); ?>index.php/video/author/<?php echo str_replace(" ", "-", $video['author']); ?>" title="<?php echo $video['author']; ?>" style="color: red;"><?php echo $video['author']; ?></a>
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

						<!-- if result search > limit them show button pagination -->
						<?php 
						if(sizeof($resultlistvideo['listvideo']) > 5){
							?>
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
		</body>
		</html>
