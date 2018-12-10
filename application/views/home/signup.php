<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng kí</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.3.1.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/vendor/css/login.css">
</head>	
<body>
	<script type="text/javascript">
		function checkForm(){
			var email = document.getElementById("inputEmail").value;
			if(email.equal("")){
				return false;
			}
		}
	</script>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Đăng kí</h5>
						<form class="form-signin" method="post" action="<?php echo base_url(); ?>index.php/C_Account/insertUser">
							<div class="form-label-group">
								<input type="email" name="email" id="inputEmail" class="form-control">
								<label for="inputEmail">Email</label>
							</div>

							<div class="form-label-group">
								<input type="text" name="author" class="form-control" >
								<label for="inputUsername">Tên tài khoản</label>
							</div>

							<div class="form-label-group">
								<input type="password" name="password" id="inputPassword" class="form-control" required>
								<label for="inputPassword">Mật khẩu</label>
							</div>

							<div class="form-label-group">
								<input type="password" name="repassword" id="inputRePassword" class="form-control" required>
								<label for="inputRePassword">Nhập lại mật khẩu</label>
							</div>


							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
							<hr class="my-4">
							<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Đăng kí với Google</button>
							<button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Đăng kí với Facebook</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>