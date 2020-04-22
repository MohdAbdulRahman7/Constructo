  
<?php

   
    $database_name = "products";
    $con = mysqli_connect('localhost','root','',$database_name);


 

   if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="plumbing.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="plumbing.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    if (isset($_GET["action"]))
    {
        if ($_GET["action"] == "delete")
        {
            foreach ($_SESSION["cart"] as $keys => $value)
            {
                if ($value["product_id"] == $_GET["id"])
                {
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="plumbing.php"</script>';
                }
            }
        }
    }
?>



<!DOCTYPE html>
<html>
<head>
	<title>summary</title>
    <link rel="stylesheet" type="text/css" href="summary.css">
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<style>
*
{
    margin-left:10px;
    padding: 0;
}

body
{
    background-image: url(backship.jpg);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh;
}
   
   @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
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
        
</style>

	 <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Details</th>
                <th>Total Price</th>
                <th>Remove Item</th>
            </tr>

            <?php
            $total = 0;
                    $item;
                    $iq;
                    $prp;
                if(!empty($_SESSION["cart"])){


                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>&#8377;<?php echo $value["product_price"]; ?></td>
                           <?php $item=$value["item_name"];
                            $iq=$value["item_quantity"];
                            $prp=$value["product_price"];?>
                            <td>
                                &#8377;<?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="summary.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                            class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);


                        ##$query="insert into product1(productname,quantity,pricedetails,totalprice) values ('$value["item_name"]',$value["item_quantity"],$value["product_price"], $total)";
                      $query="INSERT INTO products1(productname, quantity, pricedetails, totalprice) VALUES ('$item',$iq,$prp,$total)";
                       if (mysqli_query($con,$query)) {

                       		echo "record is inserted ";
                       	# code...
                       }
                       else
                       	echo "failed";

                    }
                        ?>
                        <?php 




                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">&#8377; <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>

<div class="buttons">
    <ul class="buttons1">
    <li><a href="plumbing.php">Continue Shopping</a></li>
    <li><a href="checkout.html">Checkout</a></li>
    </ul>
</div>

<style>
    .buttons
{
    max-width: 1180px;
    margin: 0 auto;

}

.buttons1
{
    float:left;
    margin-top: 38px;
    padding: 15px 75px;



}

.buttons1 li
{
    display: inline-block;
    list-style: none;
    margin-left: 60px;
    border-width: 50px;
    background: #000;
    border-radius: 50px;
    padding: 15px 90px;
}

.buttons1 li a
{
    padding:20px 40px;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 90%;
    font-weight: 100;
}
.buttons1 li a:hover
{
    border:2px solid #ffff00;
    border-radius: 47px;

}



</style>


</body>
</html>