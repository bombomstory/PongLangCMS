<?php
    $go="menu-manage";
    require_once("check_login.php");
    require_once("config.php"); 
    $do = (!empty($_GET["do"])) ? $_GET["do"] : "";
    $id = (!empty($_GET["id"])) ? $_GET["id"] : "";
    $orders = (!empty($_GET["orders"])) ? $_GET["orders"] : "";

    $sql2 = "SELECT MAX( orders ) AS max FROM `plcms_about`;";
    $rowSQL = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($rowSQL);        
    $largestNumber = $row2['max'];
    
    
    switch ($do) {
        case "increase_menu_orders":
          // echo "เลื่อนลำดับออร์เดอร์ขึ้น";
          if ($orders != 1){
              $new_orders = $orders-1;
              $sql = "UPDATE plcms_about SET orders = ".$orders." WHERE orders = ".$new_orders.";";
              mysqli_query($conn, $sql);
              $sql = "UPDATE plcms_about SET orders = ".$new_orders." WHERE id=".$id.";";
              mysqli_query($conn, $sql);
          }
          break;
        case "decrease_menu_orders":
          //echo "ลดลำดับออร์เดอร์ลง";
          $orders = $_GET["orders"];
          if ($orders < $largestNumber){
              $new_orders = $orders+1;
              $sql = "UPDATE `plcms_about` SET `orders` = ".$orders." WHERE orders = ".$new_orders.";";
              mysqli_query($conn, $sql);
              $sql = "UPDATE `plcms_about` SET `orders` = ".$new_orders." WHERE id=".$id.";";
              mysqli_query($conn, $sql);
          }
          break;
        case "add_menu":
?>

<p>
<form class="form-horizontal" method="POST" action="about-manage.php?do=save_add_menu">
  <div class="form-group">
    <label class="control-label col-sm-2" for="menuname">ชื่อเมนู:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="menuname" id="menuname" placeholder="ใส่ชื่อเมนู">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="link">ลิงค์:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="link" id="link" placeholder="ใส่ลิงค์ของเมนู">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">บันทึกเมนู</button>
    </div>
  </div>
</form>
</p>

<?php
          break;
        case "save_add_menu":

          $menuname = (!empty($_POST["menuname"])) ? $_POST["menuname"] : "";
          $link = (!empty($_POST["link"])) ? $_POST["link"] : "";

          $sql = "SELECT max(orders) as max_orders FROM plcms_about";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $max_orders = $row["max_orders"]+1;

          $sql = "INSERT INTO `plcms_about` (`id`, `menuname`, `link`, `orders`) VALUES (NULL, \"$menuname\", \"$link\", ".$max_orders.");";
          mysqli_query($conn, $sql);

          break;
        case "delete_menu":
            $sql = "DELETE FROM `plcms_about` WHERE `plcms_about`.`id` = ".$id.";";
            mysqli_query($conn, $sql);
            break;
        case "edit_menu":
            $sql = "SELECT * FROM `plcms_about` WHERE `plcms_about`.`id` = ".$id.";";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
?>

<p>
<form class="form-horizontal" method="POST" action="about-manage.php?do=save_edit_menu">
  <div class="form-group">
    <input type="hidden" name="id" value="<?=$row["id"];?>">
    <label class="control-label col-sm-2" for="menuname">ชื่อเมนู:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="menuname" id="menuname" value="<?=$row["menuname"];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="link">ลิงค์:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="link" id="link" value="<?=$row["link"];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">บันทึกเมนู</button>
    </div>
  </div>
</form>
</p>

<?php
            break;
        case "save_edit_menu": 
            $id = (!empty($_POST["id"])) ? $_POST["id"] : "";
            $menuname = (!empty($_POST["menuname"])) ? $_POST["menuname"] : "";
            $link = (!empty($_POST["link"])) ? $_POST["link"] : "";
            $sql = "UPDATE plcms_about SET menuname = \"$menuname\", link = \"$link\" WHERE id=".$id.";";
            mysqli_query($conn, $sql);         
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
  <title>การจัดการเมนู</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  <h2>การจัดการเมนู</h2>
  <p>ข้อมูลเมนูทั้งหมด</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>รหัสเมนู</th>
        <th>ชื่อเมนู</th>
        <th>ลิงค์</th>
        <th>การจัดลำดับ</th>
        <th>การจัดการเมนู</th>
      </tr>
    </thead>
    <tbody>

<?php
    $sql = "SELECT * FROM `plcms_about`  \n"
    . "ORDER BY `plcms_about`.`orders` ASC;";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
?>
      <tr>
        <td><?=$row["id"];?></td>
        <td><?=$row["menuname"];?></td>
        <td><?=$row["link"];?></td>
        <td><?=$row["orders"];?></td>
        <td>
            <a href="?do=increase_menu_orders&id=<?=$row["id"];?>&orders=<?=$row["orders"];?>"><span class="glyphicon glyphicon-arrow-up"></span></a>
            <a href="?do=decrease_menu_orders&id=<?=$row["id"];?>&orders=<?=$row["orders"];?>"><span class="glyphicon glyphicon-arrow-down"></span></a>
            <a href="?do=add_menu&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-plus-sign"></span></a>
            <a href="#" data-toggle="modal" data-target="#exampleModal<?=$row["id"];?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
            <a href="?do=edit_menu&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-edit"></span></a>
        </td>
      </tr>

      <div class="modal fade" id="exampleModal<?=$row["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content" action="about-manage.php">
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
                    <a href="?do=delete_menu&id=<?=$row["id"];?>" class="btn btn-danger">Delete</a>
                </div>
              </div>
          </div>
      </div>

<?php
    } // End of while($row = mysqli_fetch_assoc($result))
?>

    </tbody>
  </table>
</div>

<div align='center'>
  <a href="logout1.php">ออกจากระบบ</a>
</div>
</body>
</html>
