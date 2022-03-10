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
                    <div class="navbar-nav ms-auto py-0">
<?php
    $sql = "SELECT * FROM `plcms_menu`  \n"
    . "ORDER BY `plcms_menu`.`orders` ASC;";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)){
        if($active==$row["id"]){
?>
        <a href="<?=$row["link"];?>?active=<?=$row["id"];?>" class="nav-item nav-link active"><?=$row["menuname"];?></a>
<?php
        }else{
?>
        <a href="<?=$row["link"];?>?active=<?=$row["id"];?>" class="nav-item nav-link"><?=$row["menuname"];?></a>
<?php
        } // end of if($active)
    } // end of while($row = mysqli_fetch_assoc($result))
?>
                    <!--
                        <a href="" class="nav-item nav-link">Home</a>
                        <a href="" class="nav-item nav-link">About</a>
                        <a href="" class="nav-item nav-link">Domain</a>
                        <a href="" class="nav-item nav-link">Hosting</a>                       
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="team.php" class="dropdown-item">Our Team</a>
                                <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                                <a href="comparison.php" class="dropdown-item">Comparison</a>
                            </div>
                        </div>
                       
                        <a href="" class="nav-item nav-link">Contact</a>
                    -->

                    </div>
                     
