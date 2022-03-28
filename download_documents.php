<?php
  include "config.php";
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="download_documents.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>FlexStart</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php
    include("menu.php");
?>     
                  
                </div>
            </nav>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <div style="margin-top: 100px">
<?php
    $go="download_documents";

    require_once("config.php"); 

    $do = (!empty($_GET["do"])) ? $_GET["do"] : "";
    $id = (!empty($_GET["id"])) ? $_GET["id"] : "";

    switch ($do) {
        case "add_document":
            // echo "เพิ่มเอกสารสำหรับดาวน์โหลด";
?>

<p>
<form class="form-horizontal" method="POST" action="?do=save_add_document" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="documentname">ชื่อเอกสาร:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="documentname" id="documentname" placeholder="ใส่ชื่อเอกสาร">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="link">ลิงค์:</label>
    <div class="col-sm-10">
        <input type="file" id="myFile" name="myFile">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">บันทึกเอกสาร</button>
    </div>
  </div>
</form>
</p>

<?php
            break;
        case "save_add_document":
                // echo "บันทึกเอกสารสำหรับดาวน์โหลด";
                if(!empty($_POST)){
                    $documentname = $_POST["documentname"];
                    // ส่วนนี้ใช้ในการ upload file 
                    $target_dir = "downloads/documents/";
                    $target_file = $target_dir . basename($_FILES["myFile"]["name"]);
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["myFile"]["name"])). " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";
                    }
                    // จบส่วน upload file
                    $filename =  $target_file;
                    $sql = "INSERT INTO `plcms_documents` (`id`, `documentname`, `filename`, `countdownload`, `status`) \n"
                           ."VALUES (NULL, '$documentname', '$filename', 0, 1);";   
                    mysqli_query($conn, $sql);
                    ?>
                    <div class="alert alert-success">
                      <strong>ดำเนินการบันทึกเอกสารสำหรับดาวน์โหลดเสร็จสมบูรณ์!</strong>
                    </div>
<?php
                }
                break;            
        case "delete_document":
            // echo "ลบเอกสารสำหรับดาวน์โหลด";
            break;
        case "edit_document":
            // echo "แก้ไขเอกสารสำหรับดาวน์โหลด";
            break;
        case "find_document":
            // echo "ค้นหาเอกสารสำหรับดาวน์โหลด";
            if(!empty($_POST["search"])){
                $keyword = $_POST["search"];
                $sql = "SELECT * FROM `plcms_documents` \n"
                ."WHERE `plcms_documents`.`documentname` like '%$keyword%' \n"
                . "ORDER BY `plcms_documents`.`id` ASC;";
            }
            break;
        case "":
            break;
        default:
            echo "<h1>ขออภัย ไม่พบคำสั่งนี้!!</h1>";     
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>การจัดการการดาวน์โหลดเอกสาร</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <h2>การจัดการการดาวน์โหลดเอกสาร</h2>
  <p>ข้อมูลเอกสารทั้งหมด</p>  

  <form method="post" action="?do=find_document">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="ค้นหาเอกสาร" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>



<table class="table table-striped">
    <thead>
      <tr>
        <th>รหัสเอกสาร</th>
        <th>ชื่อเอกสาร</th>
        <th>ลิงค์ดาวน์โหลด</th>
        <th>การจัดการเมนู</th>
      </tr>
    </thead>
    <tbody>
<?php

    if(empty($_POST["search"])){
        $sql = "SELECT * FROM `plcms_documents`  \n"
        . "ORDER BY `plcms_documents`.`id` ASC;";
    }

    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
?>
    
    <tr>
        <td><?=$row["id"];?></td>
        <td><?=$row["documentname"];?></td>
        <td align='center'><a href='<?=$row["filename"];?>' target='_blank'><span class="glyphicon glyphicon-download-alt"></a></td>
        <td>
            <a href="?do=add_document&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-log-in"></span></a>
            <a href="?do=delete_document&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-erase"></span></a>
            <a href="?do=edit_document&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-repeat"></span></a>
        </td>
    </tr>
<?php
    }


?>
    </tbody>
    </table>