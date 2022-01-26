<?php
include("includes/encdec.php");
include("includes/dbconn.php");

    
    
    $em =  "p'4$8X]~Y)u7Sf:n";
    
    $email_decry = encrypt_decrypt("decrypt", $_COOKIE["p'4$8X]~Y)u7Sf:n"]);
     
if(isset($_COOKIE["p'4$8X]~Y)u7Sf:n"])){

setcookie($em, FALSE, -1, '/');
     
      $date_time = date('D, M j, Y \a\t g:ia');
      $ip_address = $_SERVER['REMOTE_ADDR'];
      $description = "Admin logged out.";
      $stmt = $conn->prepare("INSERT INTO logs(`ip_address`,`description`,`date_time`) VALUES(?,?,?)");
      $stmt->bind_param("sss",$ip_address,$description,$date_time);
      $stmt->execute();

echo '<script type="text/javascript">window.open("login.php","_SELF");</script>';
//header("location: login.php");
//die();

}
?>

