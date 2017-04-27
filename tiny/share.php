<?php
include 'conn.php';
?>
<html>
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
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>


  <script src="jquery.js"></script>
  <script src="bootstrap.js"></script>

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
<body class="container">
  <br><br>

<h2>People on this server</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:30%;">Name</th>
    <th style="width:55%;">Email</th>
    <th style="width:15%;">Share</th>
  </tr>
  
  <?php
        $link=$_POST['link']; $file_name=$_POST['file_name'];
        $result = mysqli_query($con, "SELECT user_id, first_name, email FROM user_record");
        

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    
                      <td>{$row['first_name']}</td>
                      <td>{$row['email']}</td>
                      <td>


                     <form action='send.php' method='POST'>

                     <input type='hidden' value={$link} name='link'>
                     <input type='hidden' value={$row['user_id']} name='rcpt_id'>
                     <input type='hidden' value={$row['first_name']} name='rcpt_name'>
                     <input type='hidden' value={$file_name} name='file_name'>
                     <input type='submit' value='Select'>

                     </form>

                      </td>
                      </tr>";  
            }
        }

  ?>

</table>
</body>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
