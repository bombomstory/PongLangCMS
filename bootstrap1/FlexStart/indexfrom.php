<?php
    session_start();
    require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FlexStart Bootstrap Template - Index</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  <div class="container">
    <h3 class="mt-4">สมัครสมาชิก</h3>
    <hr>

<form actio ="signup_db.php" metod ="post">
      <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger" role="alert">
          <?php 
             echo $_SESSION['error'];
             unset($_SESSION['error']);
           ?>
        <?php } ?>
          <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success" role="alert">
          <?php 
             echo $_SESSION['success'];
             unset($_SESSION['success']);
           ?>
        <?php } ?>
          <?php if(isset($_SESSION['warning'])) {?>
        <div class="alert alert-warning" role="alert">
          <?php 
             echo $_SESSION['warning'];
             unset($_SESSION['warning']);
           ?> 
           <?php } ?>     
  <div class="mb-3">
    <label for="firstname" class="form-label">First name</label>
    <input type="text" class="form-control"name="firstname" aria-describedby="firstname">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last name</label>
    <input type="text" class="form-control"name="lastname" aria-describedby="lastname">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control"name="email" aria-describedby="email">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3">
    <label for="confirm Password" class="form-label">Comfirm Password</label>
    <input type="password" class="form-control" name="c_password">
  </div>
  
  <button type="submit"name="signup" class="btn btn-primary">Sign up</button>
</form>
<hr>
<p>เป็นสมาชิคแล้วใช่ไหม คลิ๊กที่นี้เพื่อ<a href="signin.php" taret="_blank">เข้าสู่ระบบ</a></p>
</div>
</body>
</html>   