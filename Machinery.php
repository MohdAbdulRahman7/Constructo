
<!DOCTYPE html>
<html>
<head>
	<title>Machinery</title>
	<link rel="stylesheet" href="Machinery.css">
	<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">

</head>
<style>
	.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}

.column a
{
	text-decoration: none;
	font-size: 30px;
	color: #fff;
	margin-left: 40px;
}

.column a:hover
{
	background: #000;

}




</style>


<body>

<header>
			<nav>
				<div class="row">
					<ul class="main-nav">
					<li><a href="MainHome.html">Home</a></li> 
  					<li><a href="Machinery.php">Machinery</a></li>
  					<li><a href="plumbing.php">Plumbing</a></li> 
   					<li><a href="Electrical.php">Electrical</a></li>
  					<li><a href="service.html">Our Services</a></li>
  					<li><a href="about.html">About Us</a></li>
  					</ul>	
				</div>
			</nav>
		</header>

	<h1>Machinery</h1>
	<br>
	<br>

	
	<div class="row">
  		<div class="column">
    			<img src="h1.jpg" style="width:100%">
    			<a href="building.php">Construct A Residence</a>
  		</div>
  		<div class="column">
    			<img src="r1.jpg" alt="Forest" style="width:100%">
    			<a href="landscape.php">Construct A Landscape</a>
  		</div>
		<div class="column">
    			<img src="i2.jpg" alt="Mountains" style="width:100%">
    			<a href="Infrastructure.php">Construct An Infrastructure</a>
  		</div>
	</div>




</body>
</html>