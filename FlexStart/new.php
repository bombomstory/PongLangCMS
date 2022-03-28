<?php
 
    require_once("config.php");

     if(empty($_REQUEST["active"])){
        $active = 1;
    }else{
        $active = $_REQUEST["active"];
    }
 ?>
                    <div class="navbar-nav ms-auto py-0">
<?php
    $sql = "SELECT * FROM `plcms_new`  \n"
    . "ORDER BY `plcms_new`.`orders` ASC;";
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