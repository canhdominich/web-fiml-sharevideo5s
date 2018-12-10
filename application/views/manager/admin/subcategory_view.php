 <!DOCTYPE html>
 <html lang="en"><head>
 	<title>List SubCategory</title>
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
 					<h2>Add Subcategory</h2><hr>
 					<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/manager/admin/sub-category/insertSubCategory">
 						<div class="row">
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="ten"><strong>Category (Thể loại)</strong></label>
 									<select  class="form-control" name="category_id" id="category_id" >
 										<?php foreach ($listallcategory['allcategory'] as $category){ ?>
 										<option value="<?php echo $category['category_id']; ?>"> <?php echo str_replace("-", " ",$category['category_name']); ?></option>
 										<?php } ?>
 									</select>
 								</div>
 							</div>
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="parent_id"><strong>SubCategory name</strong></label>
 									<input type="text" name="sub_category_name" class="form-control" id="sub_category_name" placeholder="Ex: Quà Tặng Cuộc Sống">
 								</div>
 							</div>
 						</div>

 						<div class="row">
 							<div class="col-sm-6">
 								<div class="form-group">
 									<label for="ten"><strong>Description</strong></label>
 									<input type="text" name="description" class="form-control" id="description" placeholder="Ex: Phim nói về những đức tính nên và không nên của con người trong xã hội">
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

 						<div class="row justify-content-center">
 							<button type="submit" class="btn btn-success">Thêm mới</button>
 							&nbsp; &nbsp; &nbsp;
 							<button class="btn btn-danger" type="reset">Nhập lại</button>
 						</div>

 					</form>
 				</div>
 				
 				<br>

 				<div class="row">
 					<div class="card-deck">
 						<?php foreach ($listallsubcategory['allsubcategory'] as $subcategory){ ?>
 						<div class="col-sm-4">
 							<div class="card">
 								<div class="card-body">
 									<h4 class="card-title"><?php echo str_replace("-", " ", $subcategory['sub_category_name']); ?></h4>
 									<p class="card-text parent_id">Category (Thể loại): <b><?php echo $subcategory['category_id']; ?></b></p>
 									<p class="card-text parent_id">SubCategory: <b><?php echo $subcategory['sub_category_id']; ?></b></p>
 									<p class="card-text parent_id">Status : <b><?php echo $subcategory['status']; ?></b></p>
 									<p class="card-text parent_id">Date : <b><?php echo $subcategory['create_date']; ?></b></p>

 									<p class="card-text editns"><small><a href="<?php echo base_url(); ?>index.php/manager/admin/sub-category/view/<?php echo $subcategory['sub_category_id']; ?>" class="btn btn-warning btn-xs">Sửa nội dung</a></small></p>

 									<p class="card-text editns"><small><a id="delete" onclick="return confirm('Bạn chắc chắn xóa?');" href="<?php echo base_url(); ?>index.php/manager/admin/sub-category/deleteSubCategory/<?php echo $subcategory['sub_category_id']; ?>" class="btn btn-outline-danger btn-xs">Xóa nội dung</a></small></p>
 								</div>
 							</div><br/>
 						</div>
 						<?php } ?>
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
 </div>
</body>
</html>