<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.3.1.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/vendor/css/login.css">
</head>	
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Đăng nhập</h5>
						<form class="form-signin" method="post" action="<?php echo base_url(); ?>index.php/C_Account/checkAccount">
							<div class="form-label-group">
								<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
								<label for="inputEmail">Email address</label>
							</div>

							<div class="form-label-group">
								<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
								<label for="inputPassword">Password</label>
							</div>

							<div class="custom-control custom-checkbox mb-3">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Remember password</label>
							</div>
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Đăng nhập</button>
							<hr class="my-4">
							<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i>Tiếp tục với Google</button>
							<button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i>Tiếp tục với Facebook</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>