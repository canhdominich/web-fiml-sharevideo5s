<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Share Video</title>
</head>
<body>
	<style>
	#share{
		width: 100%;
		height: 180px;
		margin-top: 50px;
		box-sizing: border-box;
		border: 1px solid #d8d8d8;
	}

	#share .wp-inner{
		padding-top: 50px;
	}

	#link{
		font-size: 18px;
		font-weight: 600;
		color: orange;
	}

	#inputLink{
		width: 100%;
		line-height: 40px;
		height: 30px;
		padding-left: 10px;
		border: 1px solid #EBEDED;
	}

	.button{
		height: 40px;
		color: #fff;
		background: #01a050;
		border-radius: 10px;
		border: 1px solid #fff;
		cursor: pointer;
	}

	.button :hover{
		background: red;
	}

</style>
<div id="wrapper">
	<div id="share" class="clearfix">
		<div class="wp-inner clearfix text-center">
			<form method="post" action="<?php echo base_url(); ?>index.php/C_ShareVideo/insertLinkVideo">
				<label for="link" id="link"><strong>Link YouTube : </strong></label>
				<br>
				<input type="text" name="link" class="form-control" id="inputLink" placeholder="Ex: https://www.youtube.com/watch?v=VWJ0r3rDKCQ">
				<br>
				<br>
				<button type="submit" class="button">Chia sẻ</button>
				<button class="button" type="reset">Nhập lại</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>