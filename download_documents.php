<?php
    require_once("check_login.php");
    require_once("config.php"); 
    $do = (!empty($_GET["do"])) ? $_GET["do"] : "";
    $id = (!empty($_GET["id"])) ? $_GET["id"] : "";
    
    switch ($do) {
        case "add_document":
            // echo "เพิ่มระบบจัดการสำหรับงานโครงการและงานบริการวิชาการ";
?>

<p>
<form class="form-horizontal" method="POST" action="?do=save_add_document" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="documentname">ชื่อระบบจัดการงานโครงการและงานบริการวิชาการ:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="documentname" id="documentname" placeholder="ใส่ชื่อระบบจัดการสำหรับงานโครงการและงานบริการวิชาการ">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="link">ลิงค์:</label>
    <div class="col-sm-10">
        <input type="file" id="myFile" name="myfile">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">บันทึกระบบจัดการงานโครงการและงานบริการวิชาการ</button>
    </div>
  </div>
</form>
</p>

<?php
            break;
        case "save_add_document":
            // echo "บันทึกระบบจัดการสำหรับงานโครงการและงานบริการวิชาการ";
            if(!empty($_POST)){
                $documentname = $_POST["documentname"];
               // ส่วนนี้ใช้ในการ upload file
               $target_dir = "download_documents";
               $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
               $uploadOk = 1;
               if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {

                 echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
                 
               } else {
               echo "Sorry, there was an error uploading your file.";
               }
            
               //จบส่วน  upload file
               $filename = $target_file;
               $sql = "INSERT INTO `plcms_downloadss` (`ID`, `documenstname`, `filename`, `countdoowioad`, `status`) \n" 
                      . "VALUES (NULL, '$documenstname' , '$filename' 0, 1);";
                
                mysqli_query($com, $sql);
                ?>
                <div class="alert alert-success">
                    <strong>ดำเนินการบันทึกระบบจัดการงานโครงการและงานบริการวิชาการเสร็จสมบูณร์!</strong>
                </div>
<?php
            }
            break;
        case "delete_document":
            // echo "ลบระบบจัดการสำหรับงานโครงการและงานบริการวิชาการ";
          break;
        case "edit_document":
            // echo "แก้ไขระบบจัดการสำหรับงานโครงการและงานบริการวิชาการ";
            break;
        case "find_document":
            // echo "ค้นหาระบบจัดการสำหรับงานโครงการและงานบริการวิชาการ";
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
  <title>ระบบจัดการงานโครงการและบริการวิชาการ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <h2>ระบบจัดการงานโครงการและบริการวิชาการ</h2>
  <p>ข้อมูลเมนูทั้งหมด</p>       


  <form action="?do=find_document">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="ค้นหาระบบจัดการสำหรับงานโครงการและงานบริการวิชาการ" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>


<table class="table table-striped">
    <thead>
      <tr>
        <th>รหัสงานโครงการและบริการวิชาการ</th>
        <th>ชื่องานโครงการและบริการวิชาการ</th>
        <th>ลิงค์ระบบจัดการ</th>
        <th>การจัดการเมนู</th>
      </tr>
    </thead>
    <tbody>
        
<?php
    $sql = "SELECT * FROM `plcms_downloadss`  \n"
    . "ORDER BY `plcms_downloadss`.`ID`  DESC;";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
?>

    <tr>
        <td><?$row["id"]?></td>
        <td><?$row["documentname"]?></td>
        <td align=center><a href='<?$row["filename";]?>' target='_blank'> <span class="glyphicon glyphicon-floppy-save"></a></td>
        <td> 
            <a href=<span class="glyphicon glyphicon-plus-sign"></span></a>
            <a href=<span class="glyphicon glyphicon-minus-sign"></span></a>
            <a href=<span class="glyphicon glyphicon-edit"></span></a> </td>

    </tr>

<?php
    } // End of while($row = mysqli_fetch_assoc($result))
?>

    </tbody>
  </table>
</div>

<div align='center'>
  <a href="logout.php">ออกจากระบบ</a>
</div>
</body>
</html>    