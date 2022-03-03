<?php
    require_once("config.php");

    if (empty($_REQUEST["active"])){
        $active = 1;
    }else {
        $active = $_REQUEST["active"];
    }
?>
                    
<?php
    $sql = "SELECT * FROM `plcms_menu` ORDER BY `plcms_menu`.`order_list` ASC";
    $result = mysqli_query($conn, $sql);
    
    
    while($row = mysqli_fetch_assoc($result)){
        if($active==$row["id"]){
?>
        <li class="scroll-to-section"><a href="<?=$row["link"];?>?active=<?=$row["id"];?>" ><?=$row["menu_name"];?></a></li>
<?php
        }else{
?>
        <li class="scroll-to-section"><a href="<?=$row["link"];?>?active=<?=$row["id"];?>" ><?=$row["menu_name"];?></a></li>
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

                    
                     
<?php
    
?>