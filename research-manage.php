<?php
require_once("check login.php");
require_once("config.php"); 
$do = (!empty($_GET["do"])) ? $_GET["do"] : "";
$id = (!empty($_GET["id"])) ? $_GET["id"] : "";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>การจัดการ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <h2>การจัดการงานวิจัย</h2>
  <p>ข้อมูลเงานวิจัยทั้งหมด</p> 

  <form action="?do=find_document">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="ค้นหางานวิจัย" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>

<?php

switch ($do) {
    case "add_research":
        echo "<h1>เพิ่มงานวิจัย</h1>";

        break;

    case "delete_research":
        echo "<h1>ลบงานวิจัย</h1>";

        break;

    case "edit_research":
        echo "<h1>แก้ไขงานวิจัย</h1>";

        break;

    case "search_research":
        echo "<h1>ค้นหางานวิจัย</h1>";
        if(!empty($_POST["search"])){
            $keyword = $_POST["search"];
            $sql = "SELECT * FROM `plcms_research` \n"
            ."WHERE `plcms_research`.`title` like '%$keyword%' \n"
            . "ORDER BY `plcms_research`.`id` ASC;";
        }
        break;

    case "read_research":
        echo "<h3>http://www.ojs.mcu.ac.th/index.php/JGMP/article/download/6344/4360</h3>";

        break;

    case "":
?>

<table class="table table-striped">
    <thead>
      <tr>
        <th>รหัสงานวิจัย</th>
        <th>ชื่องานวิจัย</th>
        <th>ชื่อผู้เขียน</th>
        <th>อ่านงานวิจัย</th>
        <th>จัดการงานวิจัย</th>
      </tr>
    </thead>
    <tbody>


<?php
    $sql = "SELECT * FROM `plcms_research`  \n"
    . "ORDER BY `plcms_research`.`id` DESC;";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
?>

    <tr>
        <td><?=$row["id"];?></td>
        <td><?=$row["title"];?></td>
        <td><?=$row["authors"];?></td>
        <td><a href="?do=read_research&id=<?=$row["id"];?>">ดูรายละเอียดงานวิจัย</a></td>
        <td>
            <a href="?do=add_research&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-plus-sign"></span></a>
            <a href="#" data-toggle="modal" data-target="#exampleModal<?=$row["id"];?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
            <a href="?do=edit_research&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-edit"></span></a>
        </td>
    </tr>

    <div class="modal fade" id="exampleModal<?=$row["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content" action="research-manage.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    คุณต้องการลบเมนูหมายเลข <?=$row["id"];?> ใช่หรือไม่?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="?do=delete_research&id=<?=$row["id"];?>" class="btn btn-danger">Delete</a>
                </div>
              </div>
          </div>
      </div>

<?php
    }
?>

    </tbody>
    </table>        


<?php
        break;

    default:
        echo "<h1>ขออภัย ไม่พบคำสั่งนี้!!</h1>";     
}
?>





    </div>

<div align='center'>
  <a href="logout.php">ออกจากระบบ</a>
</div>
</body>
</html>
