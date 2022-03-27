<?php

/* // Start the session
session_start();
if (empty($_SESSION["firstname"])){
  die("<div align='center'>คุณไม่มีสิทธิ์ใช้งานระบบ <a href='login.php'>กรุณาเข้าสู่ระบบก่อน</a></div>");
} */

include_once 'config.php';
if(isset($_POST['submit']))
{    
     $title = $_POST['title'];
     $content = $_POST['content'];

     $name = $_FILES['image']['name'];
      list($txt, $ext) = explode(".", $name);
      $image_name = time().".".$ext;
      $tmp = $_FILES['image']['tmp_name'];
      
     $sql = "INSERT INTO plcm_news (title,content,image)
     VALUES ('$title','$content','$image_name')";
     if (move_uploaded_file($tmp, 'uploads/'.$image_name) && mysqli_query($conn, $sql)) {
      header("Location: news.php");
      exit();
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
     
}
?>

