<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Category Update</title>
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
					<h3>Update Category</h3><hr>
					<?php 
					foreach($getcategory['category'] as $category){
					?>
					<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/manager/admin/category/updateCategory/<?php echo $category['category_id'];?>">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="ten"><strong>Category name</strong></label>
									<input type="text" name="category_name" class="form-control" id="category_name" placeholder="<?php echo $category['category_name'];?>">
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
							<button type="submit" class="btn btn-success">Lưu lại</button>
							&nbsp; &nbsp; &nbsp;
							<button class="btn btn-danger" type="reset">Nhập lại</button>
						</div>
						<?php } ?>
					</form>
				</div>
			</div><!-- end full container-->
		</div>
	</div>
</body>
</html>