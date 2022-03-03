<?php
    /* error_reporting(0);
    ini_set('display_errors', 0); */
    require_once("config.php");
    $do = $_GET["do"];
    $id = $_GET["id"];

    $sql2 = "SELECT MAX( order_list ) AS max FROM `plcms_menu`;";
    $rowSQL = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($rowSQL);        
    $largestNumber = $row2['max'];
    
    
    
    switch ($do) {
        case "increase_menu_orders":
            $order_list = $_GET["order_list"];
            if ($order_list != 1){
                $new_orders = $order_list-1;
                $sql = "UPDATE `plcms_menu` SET `order_list` = ".$order_list." WHERE order_list = ".$new_orders.";";
                mysqli_query($conn, $sql);
                $sql = "UPDATE `plcms_menu` SET `order_list` = ".$new_orders." WHERE id=".$id.";";
                mysqli_query($conn, $sql);
            }
          break;
        case "decrease_menu_orders":
            $order_list = $_GET["order_list"];
            if ($order_list < $largestNumber){
                $new_orders = $order_list+1;
                $sql = "UPDATE `plcms_menu` SET `order_list` = ".$order_list." WHERE order_list = ".$new_orders.";";
                mysqli_query($conn, $sql);
                $sql = "UPDATE `plcms_menu` SET `order_list` = ".$new_orders." WHERE id=".$id.";";
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
          
      }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Prompt:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce </title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                         
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        
                        <ul class="nav">
                            <?php
                                include "menu.php";
                            ?>
                            
                        
                            <!-- <li class="scroll-to-section"><a href="#top" class="active">หน้าหลัก</a></li>
                            <li class="scroll-to-section"><a href="#men">ผู้ชาย</a></li>
                            <li class="scroll-to-section"><a href="#women">ผู้หญิง</a></li>
                            <li class="scroll-to-section"><a href="#kids">เด็ก</a></li> -->
                            <li class="submenu">
                                <a href="javascript:;">หน้า</a>
                                <ul>
                                    <li><a href="about.html">เกี่ยวกับเรา</a></li>
                                    <li><a href="products.html">สินค้าทั้งหมด</a></li>
                                    <li><a href="single-product.html">สินค้าเดียว</a></li>
                                    <li><a href="contact.html">ติดต่อเรา</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">ฟีเจอร์</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#explore">สำรวจ</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                       
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner">
        <div class="container">
        
        <table class="table table-striped">
            <thead>
                <tr>
                <th class="col-1" scope="col">ID</th>
                <th class="col-3" scope="col">Menus</th>
                <th class="col-3" scope="col">Link</th>
                <th class="text-center" scope="col">Orders</th>
                <th class="text-center " scope="col">menu Manages</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `plcms_menu` ORDER BY `plcms_menu`.`order_list` ASC";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?=$row["id"];?></td>
                        <td><?=$row["menu_name"];?></td>
                        <td><?=$row["link"];?></td>
                        <td class="text-center"><?=$row["order_list"];?>
                           
                        </td>
                        <td class="text-center">
                            <a href="?do=increase_menu_orders&id=<?=$row["id"];?>&order_list=<?=$row["order_list"];?>"><i class='bx bxs-up-arrow '></i></a>
                            <a href="?do=decrease_menu_orders&id=<?=$row["id"];?>&order_list=<?=$row["order_list"];?>"><i class='bx bxs-down-arrow'></i></a>
                            <a class="text-success " href="?do=add_menu&id=<?=$row["id"];?>"><i class='bx bxs-plus-circle'></i></a>
                            <a class="text-danger " href="?do=delete_menu&id=<?=$row["id"];?>"><i class='bx bxs-minus-circle'></i></a>
                            <a class="text-warning" href="?do=edit_menu&id=<?=$row["id"];?>"><i class='bx bxs-edit'></i></a>
                        </td>
                    </tr>
                <?php
                    } // End of while($row = mysqli_fetch_assoc($result))
                ?>

            </tbody>
        </table>
        </div>
        
    </div>
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">มหาวิทยาลัยกาฬสินธุ์</a></li>
                            <li><a href="#">phusithassadorn@gmail.com</a></li>
                            <li><a href="#">0641205152</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Men’s Shopping</a></li>
                        <li><a href="#">Women’s Shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">โฮมเพจ</a></li>
                        <li><a href="#">เกี่ยวกับเรา</a></li>
                        <li><a href="#">ความช่วยเหลือ</a></li>
                        <li><a href="#">ติดต่อเรา</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>