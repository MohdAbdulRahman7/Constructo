<!DOCTYPE html>
<html>
<head>
	<title>OrderId</title>
<style> 

.footer
{
  margin-bottom: 10px;
  width: 350px;
  height: 260px;
  position: relative;
  -webkit-animation: myfirst 5s 2; /* Safari 4.0 - 8.0 */
  animation: myfirst 10s 5;
}

@keyframes myfirst {
  0%   {background-image:url(order.png); left: 0px; top: 0px;}
  50%  {background-image:url(order.png); left: 900px; top: 0px;}
  100% {background-image:url(order.png); left: 0px; top: 0px;}
}


.header
{
	margin:-30px;
	text-align: center;

}

.head
{
	margin-top: 100px;
	color:  #4B0082	;
	font-family: bold;
}
</style>
</head>
<body>





<div class="container" style="margin:0px; padding: 0px;
 background-image: url(ra.jpg);background-position:center;background-size:cover;background-repeat: no-repeat;height: 100vh; box-sizing: border-box;width: 100%;padding: 50px;color: #000;font-size: 18px; ">

    <div class="header">
	
	<p><h1> 
	Your Order Has Been Successfully Placed.
	Thank You For Shopping With Us.Hope You Get The Best Services From Us.</h1></p>
</div>


<div class="head">
	<?php 
		echo("<h2>Your Order Id is ".mt_rand(10000,100000) . "<br></h2>");
	 ?>	 
</div>	 
<div class="footer">
	
</div>




</div>
</body>
</html>