  
<?php

   
    $database_name = "plumbing";
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
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
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
				echo '<script>window.location="index.php"</script>';
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
			<div style="clear:both"></div>
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
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="summary.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
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

