<?php
    session_start();
    $database_name = "plumbing";
    $con = mysqli_connect('localhost','root','',$database_name);
 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="plumbing.css">
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <title>Plumbing</title>
</head>
<body>

<header>
            <nav>
                <div class="row">
                    <ul class="main-nav">
                    <li><a href="MainHome.html">Home</a></li> 
                    <li><a href="Machinery.html">Machinery</a></li>
                    <li><a href="plumbing.php">Plumbing</a></li> 
                    <li><a href="Electrical.php">Electrical</a></li>
                    <li><a href="service.html">Our Services</a></li>
                    <li><a href="about.html">About Us</a></li>
                    </ul>   
                </div>
            </nav>
</header>



<style>
   
.row
{
    max-width: 1180px;
    margin: 0 auto;

}

.main-nav
{
    float: right;
    margin-top: 38px;


}

.main-nav li
{
    display: inline-block;
    list-style: none;
    margin-left: 60px;
}

.main-nav li a
{
    padding:5px -20px;
    color: #000000;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 90%;
    font-weight: 100;
}

.main-nav li a:hover
{
    border-bottom: 2px solid #ffff00;
}







</style>



  <h1 class="header" style="margin-top: -50px;">Plumbing</h1>
  <div class="main">
    <img src="plumbing.jpg" width="1250" height="500">
   </div> 

   <div class="pipes">
   	<h3>Pipes</h3>
   </div>
<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `plumbingcart` where type ='Pipes'";
           
    $result1 = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result1)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="summary.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #ff0000; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#0000ff; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>

   <div class="teefitting"style="background: #fff; margin-left: 35px; margin-right: 55px; margin-top: 20px;">
    <h3 class="tee" style="margin-left: 10px;
    font-size: 25px;">Tee Fittings</h3>
   </div>

<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `plumbingcart` where type='Tee'";
           
    $result1 = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result1)) {
                    ?>

           
                    <div class="col-md-4">

                        <form method="post" action="plumbing.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #ff0000; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#0000ff; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>


    <div class="pipenipples"style="background: #fff; margin-left: 35px; margin-right: 55px; margin-top: 20px;">
    <h3 class="pipenip" style="margin-left: 10px;
    font-size: 25px;">Pipe Nipples</h3>
   </div>

<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `plumbingcart` where type='Nipples'";
           
    $result1 = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result1)) {
                    ?>

           
                    <div class="col-md-4">

                        <form method="post" action="summary.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #ff0000; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#0000ff; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>

 <div class="elbowfittings"style="background: #fff; margin-left: 35px; margin-right: 55px; margin-top: 20px;">
    <h3 class="elbowfitting" style="margin-left: 10px;
    font-size: 25px;">Elbow Fittings</h3>
   </div>

<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `plumbingcart` where type='Elbow'";
           
    $result1 = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result1)) {
                    ?>

           
                    <div class="col-md-4">

                        <form method="post" action="summary.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #ff0000; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#0000ff; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>


<div class="pipereducers"style="background: #fff; margin-left: 35px; margin-right: 55px; margin-top: 20px;">
    <h3 class="pipereducer" style="margin-left: 10px;
    font-size: 25px;">Pipe Reducers</h3>
   </div>

<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `plumbingcart` where type='Reducers'";
           
    $result1 = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result1)) {
                    ?>

           
                    <div class="col-md-4">

                        <form method="post" action="plumbing.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #ff0000; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#0000ff; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>



</body>
</html>