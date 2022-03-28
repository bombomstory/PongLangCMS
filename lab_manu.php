<?php
    $go="lab_manu";
require_once("check login.php");
require_once("config.php"); 
$do = (!empty($_GET["do"])) ? $_GET["do"] : "";
$id = (!empty($_GET["id"])) ? $_GET["id"] : "";

switch ($do) {
    case "increase_menu_orders":
      // echo "เพิ่มเมนู";
      break;
      case "increase_menu_orders":
        // echo "ลบเมนู";
        break;
        case "increase_menu_orders":
            // echo "แก้ไขเมนู";
            break;
            case "increase_menu_orders":
                // echo "ค้นหาเมนู";
                break;
                case "":
                    break;
                default:
                  echo "<h1>ขออภัย ไม่พบคำสั่งนี้!!</h1>";     
              }
?>

<table class="table table-striped">
    <thead>
      <tr>
        <th>รหัสเมนู</th>
        <th>ชื่อเมนู</th>
        <th>ลิงค์</th>
        <th>การจัดลำดับ</th>
      </tr>
    </thead>
    <tbody>
    <tr>
        <td>dddd</td>
        <td>ssss</td>
        <td>aaaa</td>
        <td>wwww</td>
    <tr>
    </tbody>
    </table>        