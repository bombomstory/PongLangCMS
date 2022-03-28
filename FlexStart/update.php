<?php

/* // Start the session
session_start();
if (empty($_SESSION["firstname"])){
  die("<div align='center'>คุณไม่มีสิทธิ์ใช้งานระบบ <a href='login.php'>กรุณาเข้าสู่ระบบก่อน</a></div>");
} */


include_once 'config.php';
if(isset($_POST['submit']))
{    
     $id = $_GET['id'];
     
     $content = mysqli_real_escape_string($conn,$_POST['content']);
     $title = mysqli_real_escape_string($conn,$_POST['title']);
     $image = $_POST['image'];

     $sql = "UPDATE `plcm_news` SET `title` = '$title', `content` = '$content' WHERE `plcm_news`.`id` = ".$id.";";
     if (mysqli_query($conn, $sql)) {
      header("Location: news.php");
      exit();
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>