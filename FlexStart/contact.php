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
    $sql = "SELECT * FROM `plcms_contact`  \n"
    . "ORDER BY `plcms_contact`.`orders` ASC;";
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
                    </div>