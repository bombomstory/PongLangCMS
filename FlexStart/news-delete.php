<?php

/* // Start the session
session_start();
if (empty($_SESSION["firstname"])){
  die("<div align='center'>คุณไม่มีสิทธิ์ใช้งานระบบ <a href='login.php'>กรุณาเข้าสู่ระบบก่อน</a></div>");
} */

include_once 'config.php';

if(isset($_POST) && !empty($_POST['id'])){
	$sql = "DELETE FROM `plcm_news` WHERE `plcm_news`.`id` =".$_POST['id'];
	mysqli_query($conn, $sql);

	$_SESSION['success'] = 'Image Deleted successfully.';
	header("Location: news.php");
}else{
	$_SESSION['error'] = 'Please Select Image or Write title';
}

?>