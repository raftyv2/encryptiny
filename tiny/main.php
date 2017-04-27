<html>
<head>
  <meta charset="UTF-8">
  <title>TEA</title>
  <script type="text/javascript" src="angular.min.js"></script>
  <script type="text/javascript" src="app.js"></script>
  <script type="text/javascript" src="FileSaver.js"></script>

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
  <script src="jquery.js"></script>
  <script>
        'use strict';
        var doc = document; doc.qrySel = doc.querySelector; doc.qrySelAll = doc.querySelectorAll; // shorthand

        
        var position = "";

    $(document).ready(function(){

    $("#divA").mousemove(function(e){

    if(position.length<50){
      var pageCoords = "(" + e.pageX + "," + e.pageY + ")";
      var clientCoords = "(" + e.clientX + "," + e.clientY + ")";
      $("span:first").text("( e.pageX, e.pageY ) - " + pageCoords);
      $("span:last").text("( e.clientX, e.clientY ) - " + clientCoords);
      position= position + pageCoords + clientCoords ;

      doc.qrySel('#password-file').value = position;
      
    }
    else{

    }
    });
    });
    </script>



</head>
<body ng-app="myApp" id="divA">

<div class="container">
   <h2 class="qqq"> <img src="a.jpg" class="img-rounded"  width="70" height="70">  
    Tiny Encryption Algorithm
    <div class="qwq">
      <?php
      include 'conn.php';
      $count=0;
      $user= $_SESSION['uid'];
      $result = mysqli_query($con, "SELECT mark_read FROM messages WHERE reciver_id= $user ");
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['mark_read']==0){
          $count=$count+1;
        }
      }
      echo "<a href='messages.php'> Inbox({$count})</a>";
      ?>
      <a href="main.php"><button type="button" class="btn btn-default" style="background-color: lightgray;">Home</button></a>
      <a href="file_record.php"><button type="button" class="btn btn-default" style="background-color: lightgray;">profile</button></a>
      <a href="logout.php"><button type="button" class="btn btn-default" style="background-color: lightgray;">Logout</button></a>
    </div>
  </h2>
  </div>
<br><div class = "container"><hr></div>


<form class="local-files container" >
	<div ng-controller="mainController">
	    <div class='container'>
      <div class='well'>
      <fieldset>
        <label>Encryption/Decryption Key</label>
	        <input type="text" name="password-file" id="password-file" ng-model="key" ng-init="key='L0ck it up Åaf3'">
        </fieldset>
      </div>
    </div>
      <div class='container'>
      <div class='well'>
      <div class='panel panel-danger'>
        <div class='panel-heading'><legend>Encrypt file</legend></div>
        <div class='panel-body'>
	   <div ng-controller="encryptionController">
		    <fieldset>
		    	
		        <label>Select a source file</label>
		        <input type="file" onchange="angular.element(this).scope().onChange(this.files)">
		        <br>
		        <progress id="progress" value="{{eprogress}}" max="100"></progress>
		    </fieldset>
		</div>
  </div></div></div></div>
  <div class='container'>
      <div class='well'>
      <div class='panel panel-danger'>
        <div class='panel-heading'><legend>Decrypt file</legend></div>
        <div class='panel-body'>
		<div ng-controller="decryptionController">
		    <fieldset>
		    	
		        <label>Select an encrypted file</label>
		        <input type="file" onchange="angular.element(this).scope().onChange(this.files)">
		        <br>
		        <progress id="progress" value="{{dprogress}}" max="100"></progress>
		    </fieldset>
	    </div>
	    </div></div></div>
	</div>
</form>

<div class='container'>
      <div class='well'>
      <div class='panel panel-danger'>
        <div class='panel-heading'><legend>Upload File</legend></div>
        <div class='panel-body'>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select an encrypted file to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload" name="submitx">
</form>
</div></div></div>
</div>

</body>
</html>