<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ponglangcms";


    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    mysqli_set_charset($conn, "utf8");

    if(!$conn){
    die("ไม่สามารถเชื่อมต่อฐานช้อมูลได้".mysqli_connect_error());
}
?>