 <?php 
   include("config.php");

	session_start();
	//$db=mysqli_connect('localhost','root','','products');

	if(isset($_POST['submit'])) 
	{
		
		$username1=mysqli_real_escape_string($db,$_POST['name']);
		$email1=mysqli_real_escape_string($db,$_POST['email']);
		$password1=mysqli_real_escape_string($db,$_POST['password']);

		

		
	//$sql=" INSERT INTO `users`(`username`, `email`, `password`)VALUES('$username','$email','$password')";
	$sql="INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username1','$email1','$password1')";

			if (mysqli_query($db,$sql)) 
			{

                            header('location:login.html');
                        # code...
                       }
                       else
                       {
                        echo "failed";

                        }
		//mysqli_query($db,$sql);

		//header("location:login.php");


	}


 

 ?>