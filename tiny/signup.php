<?php

if(isset($_POST['submit'])){

	include 'conn.php';

	$fname= htmlspecialchars($_POST['fname']);
	$lname= htmlspecialchars($_POST['lname']);
	$email= htmlspecialchars($_POST['email']);
	$password= htmlspecialchars($_POST['password']);

	function mysql_fix_string($string)
	{
				if (get_magic_quotes_gpc()) $string = stripslashes($string);
					return mysql_real_escape_string($string);
	}

	$fname = mysql_fix_string($fname);	
	$lname = mysql_fix_string($lname);
	$email = mysql_fix_string($email);
	$password = mysql_fix_string($password);

	echo $fname."<br>".$lname."<br>".$email."<br>".$password;


	$result= mysqli_query($con, "INSERT INTO user_record (first_name, last_name, email, password) VALUES ('$fname', '$lname', '$email', '$password' )");

	if($result){
		
		$result= mysqli_query($con, "SELECT user_id, first_name FROM user_record WHERE email='$email' AND password='$password' ");
		$data= mysqli_fetch_assoc($result);

		$_SESSION['uid']= $data['user_id'];
		$_SESSION['name']= $data['first_name'];
		$_SESSION['login']= 1; 
		$_SESSION['dir']= $data['dir_state'];

		header("Location:main.php");
	}

}



?>
