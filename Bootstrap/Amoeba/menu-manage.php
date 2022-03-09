<?php
    require_once("config.php");
    $do = $_GET["do"];
    $id = $_GET["id"];
    $orders = $_GET["orders"];

    switch ($do) {
        case "increase_menu_orders":
          // echo "เลื่อนลำดับออร์เดอร์ขึ้น";
          if ($orders != 1){
              $new_orders = $orders-1;
              $sql = "UPDATE plcms_menu SET orders = ".$orders." WHERE orders = ".$new_orders.";";
              mysqli_query($conn, $sql);
              $sql = "UPDATE plcms_menu SET orders = ".$new_orders." WHERE id=".$id.";";
              mysqli_query($conn, $sql);
          }
          break;
          
        case "decrease_menu_orders":
          echo "ลดลำดับออร์เดอร์ลง";
          if ($orders != 1){
            $new_orders = $orders-1;
            $sql = "UPDATE plcms_menu SET orders = ".$orders." WHERE orders = ".$new_orders.";";
            mysqli_query($conn, $sql);
            $sql = "UPDATE plcms_menu SET orders = ".$new_orders." WHERE id=".$id.";";
            mysqli_query($conn, $sql);
          }
          break;
        case "add_menu":
          echo "เพิ่มเมนู";
          break;
        case "delete_menu":
            echo "ลบเมนู";
            break;
        case "edit_menu":
            echo "แก้ไขเมนู";
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
    $sql = "SELECT * FROM plcms_menu  \n"
    . "ORDER BY plcms_menu.`orders` ASC;";
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
            <a href="?do=delete_menu&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
            <a href="?do=edit_menu&id=<?=$row["id"];?>"><span class="glyphicon glyphicon-edit"></span></a>
        </td>
      </tr>
<?php
    } // End of while($row = mysqli_fetch_assoc($result))
?>

    </tbody>
  </table>
</div>

</body>
</html>