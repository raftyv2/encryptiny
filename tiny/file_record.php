<?php
include 'conn.php';
//include 'header.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
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
<body>

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




  <div class="container">
  	<div class="well">
	<div class="well">
  <h3 class="zz">Encrypted File Record</h3> <br>          
  <table class="table table-striped">
    <thead>
	<tr>
		<th>S.NO.</th>
		<th>File Name</th>
		<th>Date Of Encryption</th>
		<th>Download Link</th>
    <th>Share File</th>
	</tr>
</thead>
<tbody>
<?php
        $user= $_SESSION['uid'];
				$result = mysqli_query($con, "SELECT file_name, date_time, file_link FROM file_record WHERE user_id='$user' ORDER BY date_time DESC");
        $sno = 1;

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                	  <td>$sno</td>
                      <td>{$row['file_name']}</td>
                      <td>{$row['date_time']}</td>
                      <td><a href = '{$row['file_link']}' target = 'blank'>Download</a></td>
                      <td>
                      <form action='share.php' method='POST'>
                      <input type='hidden' name='link' value={$row['file_link']}>
                      <input type='hidden' name='file_name' value={$row['file_name']}>
                      <input type='submit' value='Share'>
                      </form>
                      </td>
                      </tr>";

                $sno=$sno+1;
            }
        }

?>
</tbody>
</table>
</div>
</div>
</body>
</html>