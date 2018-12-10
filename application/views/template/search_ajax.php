<div id="rs-search" class="clearfix">
	<div id="ajax-count-videos" class="clearfix">
		<p>Có <?php echo sizeof($listsearchvideo['searchvideo']); ?> kết quả với từ khóa
			"
			<span style="color: black; font-size: 16px;"><?php echo $listsearchvideo['key']; ?></span>
			"
		</p>
	</div>
	<?php $count = 0;?>
	<?php foreach ($listsearchvideo['searchvideo'] as $video) {
		$count++;
		if($count>6){
			break;
		}
		?>
		<div class="suggest clearfix">
			<a href="<?php echo base_url(); ?>index.php/view/video/<?php echo $video['video_id']; ?>" title="<?php echo $video['title']; ?>">
				<div class="suggest-video-image fl-left">
					<div class="mask-suggest-content">
						<div class="vertical-align clearfix">
							<p class="text-center"></p>
						</div>
					</div>
					<img src="<?php echo $video['image']; ?>" alt="" class="image">
				</div>
				<div class="suggest-video-title fl-right">
					<p class="text-tran name">
						<?php 
						if(strlen($video['title']) > 200){
							echo substr($video['title'], 0, 200)."...";
						}
						else{
							echo $video['title'];
						}
						?>
					</p>
					<p class="author"> <span style="color: #068A15;">Được đăng bởi : </span> <a href="<?php echo base_url(); ?>index.php/video/author/<?php echo str_replace(" ", "-", $video['author']); ?>"><?php echo $video['author']; ?></a> </p>
				</div>
			</a>
		</div>
	<?php } ?>

	<!-- neu ket qua tim kiem nhieu hon 6 xuat hien nut xem them de nguoi dung co nhieu lua chon-->
	<?php 
	if(sizeof($listsearchvideo['searchvideo'])>6){
		?>	
		<div id="more-views" class="clearfix text-center">
			<a href="<?php echo base_url(); ?>index.php/C_Search/searchListVideoByKey/<?php echo 
			$listsearchvideo['key'];?>">Xem thêm</a>
		</div>	
		
		<?php 
	}
	?>
	
</div>	