<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Share Video</title>
</head>
<body>
	<style>
	#notify{
		width: 100%;
		height: 180px;
		margin-top: 50px;
		box-sizing: border-box;
		border: 1px solid #d8d8d8;
	}

	#notify .wp-inner{
		padding-top: 50px;
	}

	#notify .wp-inner .home:after{
			font-family: "FontAwesome";
			content: "\f015";
			padding-right : 10px;
			font-size: 40px;
	}

	#notify .wp-inner .home{
			color: #01a050;
	}

	#notify .wp-inner .home:hover{
			color: red;
	}

</style>
<div id="wrapper">
	<div id="notify" class="clearfix">
		<div class="wp-inner clearfix text-center">
			<p style="font-size: 18px; color: orange; line-height: 50px;">Cám ơn bạn đã chia sẻ video/clip. Hệ thống sẽ duyệt và cập nhật video của bạn sớm nhất có thể!</p>
			<br/>
			<a href="<?php echo base_url(); ?>" title="Home"><p><i class="home"></i></p></a>
		</div>
	</div>
</div>
</body>
</html>