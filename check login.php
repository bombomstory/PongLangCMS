<?php
// Start the session
session_start();
if (empty($_SESSION)){
        die("<div align='center'>คุณไม่มีสิทธิ์ใช้งานระบบ <a href='login.php?go=$go'>กรุณาเข้าสู่ระบบก่อน</a></div>");
    }else if (empty($_SESSION)){
        die("<div align='center'>คุณไม่มีสิทธิ์ใช้งานระบบ <a href='login.php?go=$go'>กรุณาเข้าสู่ระบบก่อน</a></div>");
}
?>