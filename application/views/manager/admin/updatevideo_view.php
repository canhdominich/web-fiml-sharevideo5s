<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Video update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php require_once('header_view.php') ?>
	<div id="wrapper" style="padding-top: 50px;">
		<?php require_once('sidebar_view.php') ?>
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="justify-content-center">
					<h3>Update Video/Clip</h3><hr>
					<?php 
					foreach($getvideo['video'] as $video){
					?>
					<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/manager/admin/video/updateVideo/<?php echo $video['video_id'];?>">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="ten"><strong>Title</strong></label>
									<input type="text" name="title" class="form-control" id="ten" value="<?php echo $video['title'];?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="ten"><strong>Status</strong></label>
									<select  class="form-control" name="status" id="status" >
										<option value="1">Công khai</option>
										<option value="0">Riêng tư</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="ten"><strong>Link YouTube</strong></label>
									<input type="text" name="link" class="form-control" id="link" value="<?php echo $video['link'];?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="parent_id"><strong>Descriptions (Can empty)</strong></label>
									<input type="text" name="descriptions" class="form-control" id="descriptions" placeholder="<?php echo substr($video['descriptions'], 0, 30)."...";?>">
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<button type="submit" class="btn btn-success">Lưu lại</button>
							&nbsp; &nbsp; &nbsp;
							<button class="btn btn-danger" type="reset">Hoàn tác</button>
						</div>
						<?php } ?>
					</form>
				</div>
			</div><!-- end full container-->
		</div>
	</div>
</body>
</html>