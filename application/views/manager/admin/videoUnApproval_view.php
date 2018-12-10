 <!DOCTYPE html>
 <html lang="en"><head>
 	<title>List Video Unapproval</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 </head>
 <body >
 	<?php require_once('header_view.php') ?>
 	<div id="wrapper" style="padding-top: 50px;">
 		<?php require_once('sidebar_view.php') ?>
 		<div id="page-content-wrapper">
 			<div class="container-fluid">
 				<div class="justify-content-center">
 					<h3>Xử lý yêu cầu đăng tải video</h3><hr>
 				</div>
 				<div class="row" style="padding-top: 50px;>
 				<div class="card-deck">
 					<?php foreach ($listlink['link'] as $video){ ?>
 					<div class="col-sm-4">
 						<div class="card">
 							<div class="card-body">
 								<a href="<?php echo $video['link']; ?>" target="_blank">
 									<h6 class="card-title" style="color: red;"><?php echo $video['link']; ?></h6>
 								</a>
 								
 								<p class="card-text parent_id">User_id : <b><?php echo $video['user_id']; ?></b></p>

 								<p class="card-text parent_id">Status : <b><?php echo $video['status']; ?></b></p>

 								<p class="card-text parent_id">Date : <b><?php echo $video['create_date']; ?></b></p>

 								<?php 
 								if($video['status'] == 0){
 								?>
 								<p class="card-text editns"><small><a href="<?php echo base_url(); ?>index.php/manager/admin/C_Share_Video/videoApproval/<?php echo $video['video_id']; ?>" class="btn btn-warning btn-xs">Đồng ý</a></small></p>
 								<?php
 							}
 							?>

 							<p class="card-text editns"><small><a id="delete" onclick="return confirm('Bạn chắc chắn xóa?');" href="<?php echo base_url(); ?>index.php/manager/admin/C_Share_Video/deleteLinkVideoById/<?php echo $video['video_id']; ?>" class="btn btn-outline-danger btn-xs">Loại bỏ</a></small></p>
 						</div>
 					</div><br/>
 				</div>
 				<?php } ?>
 			</div>

 		</div>
 	</div>
 </div>
</div>

<div id="copyright-admin" class="text-center clearfix">
	<p>
		<i class="icon-copyright"></i>Copyright @2018 ddccenter.com. Bản quyền website thuộc về DDC (Design Degital Company)
	</p>
	<style>
	#copyright-admin{
		margin-top : 40px;
		padding-top : 10px;
		height: 50px;
		background: #F0F4F5;
	}
</style>
</div>
</body>
</html>