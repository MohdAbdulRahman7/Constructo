<?php

$firstname=$_POST['firstname'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$state=$_POST['state'];
$zip=$_POST['zip'];

if(!empty($firstname)|| !empty($email)|| !empty($address)|| !empty($phone)|| !empty(state)|| !empty($zip))
{
	$dbconnect=mysqli_connect("localhost","root","","customers");
	if(mysqli_connect_errno($dbconnect))
	{
		echo "Connection Failed";
	}
	else
	{
		$SELECT="SELECT `email` FROM `customers` WHERE email=? Limit 1";

		$INSERT= "INSERT INTO customers(id,name,email,address,phone,state,zip) values(?,?,?,?,?,?)";


		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum=$stmt->num_rows;

		if($rnum==0)
		{
			$stmt->close();

			$stmt=$conn->prepare($INSERT);
			$stmt=$bind_param("ssssii",$firstname,$email,$address,$phone,$state,$zip);
			$stmt->execute();
			echo "New Record Inserted Succefully ";

		}
		stmt->close();
		conn->close();
	}
}

else
{
	echo "All fields are required";
	die();
}



?>
