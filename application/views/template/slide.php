<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slide.css">
</head>
<body>
	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
			slideIndex++;
			if (slideIndex > slides.length) {slideIndex = 1}    
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				slides[slideIndex-1].style.display = "block";  
				dots[slideIndex-1].className += " active";
	    setTimeout(showSlides, 2000); // Change image every 2 seconds
	}
	</script>
	<?php
	foreach($listallslide['listslide'] as $slide){

	?>
	<div class="mySlides fade">
		<div class="numbertext">1 / 3</div>
		<img src="img_nature_wide.jpg" style="width:100%">
		<div class="text">Caption Text</div>
	</div>
	<?php
	}
	?>

</body>
</html>