 <!DOCTYPE html>
 <html lang="en"><head>
 	<title>Upload video/clip</title>
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
 					<h3>Upload Video/Clip</h3><hr>
 					<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/manager/admin/view/conductUploadVideo">
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

 						<?php 
 						foreach($infovideo['info'] as $video){
 						?>
 						<div class="row">
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="ten"><strong>Link YouTube</strong></label>
 									<input type="text" name="link" class="form-control" id="ten" value="<?php echo $video['link']; ?>">
 								</div>
 							</div>
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="parent_id"><strong>User_id</strong></label>
 									<input type="text" name="user_id" class="form-control" id="user_id" value="<?php echo $video['user_id']; ?>">
 								</div>
 							</div>
 						</div>
 						<?php
 					}
 					?>

 					<div class="row">
 						<div class="col-sm-6">
 							<div class="form-group">
 								<label for="ten"><strong>Date</strong></label>
 								<input type="text" name="date" class="form-control" id="date" value="<?php echo $video['create_date']; ?>">
 							</div>
 						</div>
 						<div class="col-sm-6">
 							<div class="form-group">
 								<label for="parent_id"><strong>Descriptions</strong></label>
 								<input type="text" name="descriptions" class="form-control" id="descriptions" >
 							</div>
 						</div>
 					</div>

 					<div class="row justify-content-center">
 						<button type="submit" class="btn btn-success">Upload</button>
 						&nbsp; &nbsp; &nbsp;
 						<button class="btn btn-danger" type="reset">Nhập lại</button>
 					</div>

 				</form>
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