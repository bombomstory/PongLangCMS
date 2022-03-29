<?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ponglangcms";

    if(empty($_REQUEST["active"])){
        $active = 1;
    }else{
        $active = $_REQUEST["active"];
    }

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    mysqli_set_charset($conn, "utf8");

    if(!$conn){
        die("ไม่สามารถเชื่อมต่อฐานช้อมูลได้".mysqli_connect_error());
    }else{
?>
                    <nav id="navbar" class="navbar">
        <ul>
<?php
    $sql = "SELECT * FROM `plcms_menu`;";
    $sql = "SELECT * FROM `plcms_menu`  \n"

    . "ORDER BY `plcms_menu`.`orders` ASC;";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)){
?>
        <li><a href="<?=$row["id"];?>"><?=$row["menuname"];?></a></li>
<?php
    } // end of while($row = mysqli_fetch_assoc($result))
?>
</ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
                 <!--   <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    
    -->
<?php
    }
?>