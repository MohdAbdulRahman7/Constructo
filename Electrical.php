 <?php 
session_start();
$database_name = "constructo";
$con = mysqli_connect('localhost','root','',$database_name);

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'           =>  $_GET["id"],
                'item_name'         =>  $_POST["hidden_name"],
                'item_price'        =>  $_POST["hidden_price"],
                'item_quantity'     =>  $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="electrical.php"</script>';

        }
    }
    else
    {
        $item_array = array(
            'item_id'           =>  $_GET["id"],
            'item_name'         =>  $_POST["hidden_name"],
            'item_price'        =>  $_POST["hidden_price"],
            'item_quantity'     =>  $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="electrical.php"</script>';
            }
        }
    }
}

?>






 <!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="Electrical.css">
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Electrical</title>


</head>

<style>
    body
    {
        background-image:url(eback.jpg);
        background-size: cover;
        background-position: center;
        height: 100vh;
   
    }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #1E90FF;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }

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


 <h1 class="header" style="margin-top: -50px;">Electrical</h1>
  <div class="main" style="margin-left: 40px;
    margin-right: 50px;">
    <img src="Electrical.jpg" width="1250" height="500">
   </div>

<div class="sockets"style="background:#fff;margin-left: 35px;margin-top: 20px;margin-right: 55px;height: 30px;">
    <h3 class="sockets"style="margin-left: 10px;
    font-size: 25px;">Sockets</h3>
   </div>
<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `electrical` where type='Socket' ";
           
    $result = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="electrical.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #fff; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#4B0082; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>

<div class="mm"style="background:#fff;margin-left: 35px;margin-top: 20px;margin-right: 55px;height: 30px;">
    <h3 class="mm"style="margin-left: 10px;
    font-size: 25px;">Multi Meter</h3>
   </div>
<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `electrical` where type='Multimeter' ";
           
    $result = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="electrical.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #fff; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#4B0082; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>


<div class="spp"style="background:#fff;margin-left: 35px;margin-top: 20px;margin-right: 55px;height: 30px;">
    <h3 class="spp"style="margin-left: 10px;
    font-size: 25px;">Solar Power Plant</h3>
   </div>
<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `electrical` where type='spp' ";
           
    $result = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="electrical.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #fff; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#4B0082; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>



<div class="sc"style="background:#fff;margin-left: 35px;margin-top: 20px;margin-right: 55px;height: 30px;">
    <h3 class="sc"style="margin-left: 10px;
    font-size: 25px;">Security Cameras</h3>
   </div>
<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `electrical` where type='sc' ";
           
    $result = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="electrical.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #fff; font-family: bold;"><?php echo $row["name"]; ?></h3>
                                <h4 class="des"style="text-align:center; font-size:15px;"><?php echo $row["description"]; ?></h4>
                                <h5 class="prices" style="color:#4B0082; font-size: 18px;">&#8377;<?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <?php
                    
                }
            
        ?>

       
    </div>
   

<div style="clear:both "></div>
            <br />
            <h3 style="color: #fff;">Order Details</h3>
            <div class="table-responsive" style="color: #fff;">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Item Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td>&#8377;<?php echo $values["item_price"]; ?></td>
                        <td>&#8377;<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                        <td><a href="electrical.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">&#8377; <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                    <?php
                    }
                    ?>
                        
                </table>
            </div>
        </div>
    
 <div class="button" style="float: right;
                                    background: #000;
                                    color: #000;
                                    text-decoration: none;
                                    padding: 10px;
                                    margin-right: 10px;
                                    margin-top: -10px;
                                    border-radius: 20px;





                                ">
            <a href="checkout.html" style="color: #fff; text-decoration: none;"><i class="fas fa-shopping-cart"></i>  Checkout</a>
        </div> 
    </div>
    <br />

</body>
</html>
