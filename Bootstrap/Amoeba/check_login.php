<?php
// Start the session
session_start();
print_r($_SESSION);
if (empty($_SESSION["firstname"])){
  die("<div align='center'>คุณไม่มีสิทธิ์ใช้งานระบบ <a href='login.php'>กรุณาเข้าสู่ระบบก่อน</a></div>");
}
?>