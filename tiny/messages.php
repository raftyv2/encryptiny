<head>
  <link rel="stylesheet" href="bootstrap.css">
  <style>
  	 .qwq{ 
      float: right;
    }
     .nav{
      padding-left: 20%; 
    }
    h4{
       text-align: center;
    }
    
    .jk{
      border: 1px;
    }
    .zz{
	float: center;
    }
	
  </style>
 </head>
 <div class="container">
   <h2 class="qqq"> <img src="a.jpg" class="img-rounded"  width="70" height="70">  
    Tiny Encryption Algorithm
    <div class="qwq">
      <a href="main.php"><button type="button" class="btn btn-default" style="background-color: lightgray;">Home</button></a>
      <a href="file_record.php"><button type="button" class="btn btn-default" style="background-color: lightgray;">profile</button></a>
      <a href="logout.php"><button type="button" class="btn btn-default" style="background-color: lightgray;">Logout</button></a>
    </div>
  </h2>
  </div>
 <br>

<?php

include 'conn.php';

$result=mysqli_query($con, "UPDATE messages SET mark_read=1 WHERE reciver_id={$_SESSION['uid']}");

$res= mysqli_query($con, "SELECT sender_id, file_link, msg_content, date_time FROM messages WHERE reciver_id={$_SESSION['uid']} ORDER BY date_time DESC");
while($row= mysqli_fetch_assoc($res)){
	$res1= mysqli_query($con, "SELECT first_name FROM user_record WHERE user_id={$row['sender_id']}");
	$sndr= mysqli_fetch_assoc($res1);
	echo "

		<div class='container'>
			<div class='well'>
			<div class='panel panel-danger'>
				<div class='panel-heading'>Sender: {$sndr['first_name']} <div style='float:right'>{$row['date_time']}</div></div>
				<div class='panel-body'>
				<a href={$row['file_link']}>Download</a><br>
				{$row['msg_content']}
			</div>
			</div>
			</div>
			</div>
		

	";
}

?>
