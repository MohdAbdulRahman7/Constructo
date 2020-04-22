<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="slideshow-container"style="margin-left: 0px;">

		<div class="mySlides fade">
		  	<img src="r1.jpg" style="width:30%">
		</div>	
	
		<div class="mySlides fade">
 		   	<img src="g1.jpg" style="width:30%">
		</div>
		<br>
		<div style="text-align:center">
	  		<span class="dot"></span> 
	  		<span class="dot"></span> 
		</div>

	</div>


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
</body>
</html>