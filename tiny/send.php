
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
<?php
echo "<br><br><br>
<div class='container'>
<div class= 'well'>
<div class='panel panel-danger'>
<div class='panel-heading'>
Send to: {$_POST['rcpt_name']} <br>
File name: {$_POST['file_name']} </div>
<div class='panel-body'>
<form method='POST' action='confirm_send.php'>
<input type='text' value={$_POST['link']} readonly style='width: 30%' name='file_link'><br><br>
<input type='text' name='msg_content' placeholder='paste the key or write additional details(optional)..' style='width: 30%'><br><br>
<input type='hidden' name='rcpt_id' value={$_POST['rcpt_id']}>
<input type='submit' value='Send'>
</form></div>
</div> </div>
";
?>