 <!DOCTYPE html>
 <html lang="en"><head>
 	<title>My Videos</title>
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
 					<h3>My Videos</h3><hr>
 				</div>
 				<div class="row" style="padding-top: 50px;>
 				<div class="card-deck">
 					<?php foreach ($listmyvideo['myvideo'] as $video){ ?>
 					<div class="col-sm-4">
 						<div class="card">
 							<div class="card-body">
 								<img  style="height: 250px" class="card-img-top img-fluid img-thumbnail" src="<?php echo $video['image']; ?>" alt="" >
 								<br/>
 								<br/>
 								<h6 class="card-title" style="color: red;"><?php echo substr($video['title'], 0, 100)."..."; ?></h4>

 									<p class="card-text parent_id">Date : <b><?php echo $video['date']; ?></b></p>

 									<p class="card-text parent_id">Views : <b><?php echo $video['views']; ?></b></p>

 									<p class="card-text editns"><small><a id="delete" onclick="return confirm('Bạn chắc chắn xóa?');" href="<?php echo base_url(); ?>index.php/C_MyVideos/deleteVideo/<?php echo $video['video_id']; ?>/<?php echo $video['user_id']; ?>" class="btn btn-outline-danger btn-xs">Xóa</a></small></p>
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