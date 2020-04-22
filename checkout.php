<?php 
   include("config.php");

	session_start();

	if(isset($_POST['submit'])) 
	{
		
		$firstname1=mysqli_real_escape_string($db,$_POST['firstname']);
		$email1=mysqli_real_escape_string($db,$_POST['email']);
		$address1=mysqli_real_escape_string($db,$_POST['address']);
		$phone1=mysqli_real_escape_string($db,$_POST['phone']);
		$state1=mysqli_real_escape_string($db,$_POST['state']);
		$zip1=mysqli_real_escape_string($db,$_POST['zip']);


		$sql="INSERT INTO `checkout`(`firstname`, `email`, `address`, `phone`, `state`, `zip`) VALUES ('$firstname1','$email1','$address1','$phone1','$state1','$zip1')";
	
			if (mysqli_query($db,$sql)) 
			{

                            header('location:orderid.php');
                        # code...
                       }
                       else
                       {
                        echo "failed";

                        }


	}	

?>