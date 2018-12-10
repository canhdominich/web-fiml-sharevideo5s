 <!DOCTYPE html>
 <html lang="en"><head>
 	<title>List video/clip</title>
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
 					<h3>Thêm Video/Clip</h3><hr>
 					<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/manager/admin/view/insertVideo">
 						<div class="row">
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="ten"><strong>SubCategory (Danh mục con của thể loại)</strong></label>
 									<select  class="form-control" name="sub_category_id" id="category_id" >
 										<?php foreach ($listallsubcategory['allsubcategory'] as $subcategory){ ?>
 										<option value="<?php echo $subcategory['sub_category_id']; ?>"> <?php echo str_replace("-", " ",$subcategory['sub_category_name']); ?></option>
 										<?php } ?>

 									</select>
 								</div>
 							</div>
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="ten"><strong>Status</strong></label>
 									<select  class="form-control" name="status" id="category_id" >
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
 									<input type="text" name="link" class="form-control" id="ten" placeholder="Ex: https://www.youtube.com/watch?v=VWJ0r3rDKCQ">
 								</div>
 							</div>
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="parent_id"><strong>Descriptions (Can empty)</strong></label>
 									<input type="text" name="descriptions" class="form-control" id="parent_id" placeholder="Ex: Nếu ai ăn thịt và lên án những người ăn thịt chó vì lý do đạo đức, tôi nghĩ đó là đạo đức giả">
 								</div>
 							</div>
 						</div>
 						
 						<div class="row justify-content-center">
 							<button type="submit" class="btn btn-success">Thêm mới</button>
 							&nbsp; &nbsp; &nbsp;
 							<button class="btn btn-danger" type="reset">Nhập lại</button>
 						</div>

 					</form>
 				</div>
 				<div class="row" style="padding-top: 50px;>
 				<div class="card-deck">
 					<?php foreach ($listallvideo['allvideo'] as $video){ ?>
 					<div class="col-sm-4">
 						<div class="card">
 							<div class="card-body">
 								<img  style="height: 250px" class="card-img-top img-fluid img-thumbnail" src="<?php echo $video['image']; ?>" alt="" >
 								<br/>
 								<br/>
 								<h6 class="card-title" style="color: red;"><?php echo substr($video['title'], 0, 100)."..."; ?></h4>

 									<p class="card-text parent_id">SubCategory (Danh mục con của thể loại): <b><?php echo $video['sub_category_id']; ?></b></p>

 									<p class="card-text parent_id">Video Id: <b><?php echo $video['video_id']; ?></b></p>

 									<p class="card-text parent_id">Link : <b style="color: #004FFA;"><?php echo $video['link']; ?></b></p>

 									<p class="card-text parent_id">Image : <b><?php echo $video['image']; ?></b></p>

 									<p class="card-text parent_id">Time : <b><?php echo $video['limit_time']; ?></b></p>

 									<?php 
 									if(strlen($video['descriptions']) > 100){
 									?>
 									<p class="card-text parent_id">Description: <b><?php echo substr($video['descriptions'], 0, 100)."..."; ?></b></p>

 									<?php
 								}
 								?>	


 								<p class="card-text parent_id">Status : <b><?php echo $video['status']; ?></b></p>

 								<p class="card-text parent_id">Date : <b><?php echo $video['date']; ?></b></p>

 								<p class="card-text parent_id">By : <b><?php echo $video['author']; ?></b></p>

 								<p class="card-text parent_id">Views : <b><?php echo $video['views']; ?></b></p>

 								<p class="card-text editns"><small><a href="<?php echo base_url(); ?>index.php/manager/admin/video/view/<?php echo $video['video_id']; ?>" class="btn btn-warning btn-xs">Sửa nội dung</a></small></p>

 								<p class="card-text editns"><small><a id="delete" onclick="return confirm('Bạn chắc chắn xóa?');" href="<?php echo base_url(); ?>index.php/manager/admin/video/deleteVideo/<?php echo $video['video_id']; ?>" class="btn btn-outline-danger btn-xs">Xóa nội dung</a></small></p>
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