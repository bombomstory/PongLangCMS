<?php
    $go="download_documents";
    require_once("check_login.php");
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
        
        </td>
    </tr>
<?php
    }
?>
    </tbody>
    </table>