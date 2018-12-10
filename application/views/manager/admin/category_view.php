<!DOCTYPE html>
<html lang="en"><head>
	<title>List Category Video</title>
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
				<h3>Quản lí danh mục cha</h3><hr>
				<div class="row">
					<div class="card-deck">
						<?php foreach ($listallcategory['allcategory'] as $category){ ?>
							<div class="col-sm-3">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title"><?php echo str_replace("-", " ", $category['category_name']); ?></h4>
										<p class="card-text parent_id">Id: <b><?php echo $category['category_id']; ?></b></p>
										<p class="card-text parent_id">Status : <b><?php echo $category['status']; ?></b></p>
										<p class="card-text parent_id">Date : <b><?php echo $category['create_date']; ?></b></p>

										<p class="card-text editns"><small><a href="<?php echo base_url(); ?>index.php/manager/admin/category/view/<?php echo $category['category_id']; ?>" class="btn btn-warning btn-xs">Sửa nội dung</a></small></p>
										
										<p class="card-text editns"><small><a id="delete" onclick="return confirm('Bạn chắc chắn xóa?');" href="<?php echo base_url(); ?>index.php/manager/admin/category/deleteCategory/<?php echo $category['category_id']; ?>" class="btn btn-outline-danger btn-xs">Xóa nội dung</a></small></p>
									</div>
								</div><br/>
							</div>
						<?php } ?>
					</div>

				</div>
				<div class="justify-content-center">
					<h2>Add category</h2><hr>
					<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/manager/admin/category/insertCategory"">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="ten"><strong>Category name</strong></label>
									<input type="text" name="category_name" class="form-control" id="category_name" placeholder="Ex: Thể thao">
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
						
						<div class="row justify-content-center">
							<button type="submit" class="btn btn-success">Thêm mới</button>
							&nbsp; &nbsp; &nbsp;
							<button class="btn btn-danger" type="reset">Nhập lại</button>
						</div>

					</form>
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