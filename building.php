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
            echo '<script>window.location="building.php"</script>';

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
                echo '<script>window.location="building.php"</script>';
            }
        }
    }
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Building</title>
</head>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

<style>


body
{
	background-image: url(bback2.jpg);
	background-size: cover;
	background-position: center;
	height: 100vh;


}



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
    color: #000;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 90%;
    font-weight: 100;
}

.main-nav li a:hover
{
    border-bottom: 2px solid #ffff00;
}

.hm
{
background:#696969;
margin-left: 45px;
margin-top: 20px;
margin-right: 60px;
height: 30px;
}

.hm h3
{
	color: #fff;
	margin-left: 10px;
	font-size: 25px;
}

@import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
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
</style>

<h1 class="header" style="margin-top: -50px; margin-left: 50px;color: #000 ">Construct A Residence</h1>

<div class="main">
    <img src="building.jpg" width="1250" height="500" style="margin-left: 50px;">
</div> 

<div class="hm">
    <h3>Heavy Machinery</h3>
   </div>

<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `residence` where type='hm' ";
           
    $result = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="building.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #000; font-family: bold;"><?php echo $row["name"]; ?></h3>
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



<div class="hm">
    <h3>Construction Materials</h3>
   </div>

<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `residence` where type='cm' ";
           
    $result = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="building.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #000; font-family: bold;"><?php echo $row["name"]; ?></h3>
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

<div class="hm">
    <h3>Construction Tools</h3>
   </div>

<div class="container" style=" margin:50px;" >
        <?php
            $query = "SELECT * FROM `residence` where type='ct' ";
           
    $result = mysqli_query($con,$query);
           
                while ($row = mysqli_fetch_array($result)) {
                    ?>

           
                    <div class="col-md-4">

                     <form method="post" action="building.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product" style="max-height: 600px">
                                <img src="<?php echo $row["image"]; ?>" class="images"style="max-height: 180px;">
                                <h3 class="names" style="font-size: 18px; color: #000; font-family: bold;"><?php echo $row["name"]; ?></h3>
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
            <h3>Order Details</h3>
            <div class="table-responsive">
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
                        <td><a href="building.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
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
                                    color: #fff;
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

