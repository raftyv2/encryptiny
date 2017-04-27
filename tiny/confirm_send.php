<?php
include 'conn.php';
$sender_id= $_SESSION['uid'];
$reciver_id=$_POST['rcpt_id'];
$file_link=$_POST['file_link'];
$msg_content=$_POST['msg_content'];
$result= mysqli_query($con, "INSERT INTO messages(sender_id, reciver_id, file_link, msg_content, date_time, mark_read) VALUES ($sender_id, $reciver_id, '$file_link', '$msg_content', NOW(), 0)");
header('location: file_record.php');

?>