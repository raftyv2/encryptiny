<?php
if(isset($_POST['submit'])){

	include 'conn.php';

	$email= htmlspecialchars($_POST['email']);
	$password= htmlspecialchars($_POST['password']);

	function mysql_fix_string($string)
	{
				if (get_magic_quotes_gpc()) $string = stripslashes($string);
					return mysql_real_escape_string($string);
	}

	$email = mysql_fix_string($email);
	$password = mysql_fix_string($password);

	echo $email."<br>".$password."<br>";


	$result= mysqli_query($con, "SELECT user_id, first_name, email, password, dir_state FROM user_record WHERE email='$email' AND password='$password' ");

	if(mysqli_num_rows($result)){
		
		$data=mysqli_fetch_assoc($result);	
		$_SESSION['uid']= $data['user_id'];
		$_SESSION['name']= $data['first_name'];
		$_SESSION['login']= 1; 
		$_SESSION['dir']= $data['dir_state'];

		header("Location:main.php");
	}
	else
		header("Location:index.html");	

}



?>
