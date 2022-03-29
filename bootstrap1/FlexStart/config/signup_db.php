<?php
    
    session_start();
    require_once 'confin/db.php';

    if (isset($_POST['signup'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $emil=$_POST['email'];
        $password=$_POST['password'];
        $c_password=$_POST['c_password'];
        $urole ='user';

        if (empty($firstname)){
            $_SESSION['error']='กรุณากรอกชื่อ';
            heder("location: indexfrom.php");
        }else if (empty($lastname)){
            $_SESSION['error']='กรุณากรอกนามสกุล';
            heder("location: indexfrom.php");
        }else if (empty($email)){
            $_SESSION['error']='กรุณากรอกอีเมล';
            heder("location: indexfrom.php");
        }else if (!file_var ($email,FILTER_VALDATE_EMAIL)){
            $_SESSION['error']='รูปแแบบอีเมลไม่ถูกต้อง';
            heder("location: indexfrom.php");
        }else if (empty($password)){
            $_SESSION['error']='กรุณากรอกรหัสผ่าน';
            heder("location: indexfrom.php");
        }else if (strlen($_POST['password']).20 ||strlen($_POST['password'])<5){
             $_SESSION['error']='รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            heder("location: indexfrom.php");
        }else if (empty($c_password)){
            $_SESSION['error']='กรุณายืนยันรหัสผ่าน';
            heder("location: indexfrom.php");
        }else if (empty($c_password)){
            $_SESSION['error']='รหัสผ่านไม่ตรงกัน';
            heder("location: indexfrom.php");


        }else{
            try{

                $check_email = $con->prepara("SELECT email FROM users WHERE email");
                $check_email->bindParam(":email",$email);
                $check_email->execute();
                $row=$chack_email->fetch(PDO::FETCH_ASSOC);

                if ($row ['email']== $email){
                    $_SESSION['warning'] = "มีอีเมลนี้อยูในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี้</a> เพื่อเข้าสู่ระบบ";
                    header("location: indexfrom.php");
                }else if (!isset($_SESSION['error'])){
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $con->prepre("INSERT INTO users(firstname, lastname, email, password, urole)
                                        VALUES(:firstname, :lastname, :email, :password, :urole");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lasstname);
                    $stmt->bindParam(":email", $mail);
                    $stmt->bindParam(":passwrod", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->exeute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลื๊กที่นี้เพื่อเข้าสู่ระบบ";
                    header("location: indexfrom.php");
                
                }else{
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: indexfrom.php");
                
                }catch(PDOException $e) {
                    echo $e->getMessage();            }

                    
                
            }
        }
            
           

    }
?>
