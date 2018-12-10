<div id="wp-list-post" class="clearfix">
	<ul>
		<?php foreach ($resultlistvideo['listvideo'] as $video) {
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
							<span><?php echo $video['date']; ?> || <a href="" style="color: red;"><?php echo $video['author']; ?></a></span><br/> 
							<span><?php echo $video['views']; ?> Views</span>
						</div>
					</div>
				</div>
			</a>
		</li>
		<?php } ?>
	</ul>
</div>


