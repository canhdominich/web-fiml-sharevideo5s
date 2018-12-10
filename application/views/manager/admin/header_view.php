<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<div class="container-fluid">
	<div class="fixed-top">
		<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #FA6114; height: 50px;">
			<a href="" class="navbar-brand">
				<img src="<?php echo base_url(); ?>images/logoadmin.png" alt="Logo" style="height: 30px; width: 100px;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="" class="nav-link text-white btn-outline-danger" id="menu-toggle">DASHBOARD</a></li>
				</ul>
			</div>
			<form class="form-inline" method="get" action="<?php echo base_url(); ?>index.php/manager/admin/search">
				<input name="query" type="text" class="form-control" placeholder="Search..." style="height: 35px" size="40">
				<button class="btn btn-light text-center text-primary border-dark" style="height: 35px"> Tìm kiếm</button>
			</form>
		</nav>
	</div>
	
	<br/>
</div>
