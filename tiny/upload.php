<?php
include 'conn.php';
$uname=$_SESSION['name'];
$uid=$_SESSION['uid'];
$dir=$_SESSION['dir'];
if($dir!=1){
	mkdir("uploads/".$uid.$uname);
	$result= mysqli_query($con, "UPDATE user_record SET dir_state = 1 WHERE user_id= '$uid'");
}
$target_dir = "uploads/".$uid.$uname."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submitx"])) {
    if($FileType == "secret"){
    	echo $target_file."<br>";
        echo $FileType."<br>";
        $uploadOk = 1;
        //move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $file_name=basename($_FILES["fileToUpload"]["name"]);
        $file_link="uploads/".$uid.$uname."/".$file_name.".zip";
        $zip = new ZipArchive;
		$res = $zip->open('uploads/'.$uid.$uname.'/'.basename($_FILES["fileToUpload"]["name"]).'.zip', ZipArchive::CREATE);
		if ($res === TRUE) {
    		$zip->addFile($_FILES["fileToUpload"]["tmp_name"], basename($_FILES["fileToUpload"]["name"]));
    		$zip->close();

    		$result= mysqli_query($con, "INSERT INTO file_record (user_id, file_name, date_time, file_link) VALUES ($uid, '$file_name', NOW(), '$file_link' )");
    		header ("Location: file_record.php");
    		echo 'ok';
		} else {
    		echo 'failed';
	}


    }
    else{
    	echo "invalid file";
    }
}
?>