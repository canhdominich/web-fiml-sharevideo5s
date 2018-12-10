 <!DOCTYPE html>
 <html lang="en"><head>
 	<title>Upload image</title>
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
 					<h3>Upload image</h3><hr>
 					<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/manager/C_Upload_Image/uploadImage">
 						<div class="row">
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="parent_id"><strong>Image</strong></label>
 									<input type="file" name="image" class="form-control" id="image"  placeholder="Upload ảnh">
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
 					<?php foreach ($listallimage['allimage'] as $image){ ?>
 					<div class="col-sm-4">
 						<div class="card">
 							<div class="card-body">
 								<img  style="height: 250px" class="card-img-top img-fluid img-thumbnail" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="" >
 								<br>
 								<br>
 								<p class="card-text editns"><small><a id="delete" href="" class="btn btn-outline-danger btn-xs"><?php echo substr($image, 0, 30).'...' ?></a></small></p>
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