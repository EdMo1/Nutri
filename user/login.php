<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_COOKIE["p'4$8X]~Y)u7Sf:n"])){
     
  header("Location: index.php"); 
}else{

if(isset($_POST['log'])){
  include("includes/dbconn.php");
  include("includes/encdec.php");

          $email = strtolower(str_replace(" ", "", $_POST['email']));
          $pass = sha1($_POST['pass']);
         
          $stmt = $conn->prepare("SELECT `id`,`email` FROM `tblusers` WHERE `email` = ? AND `password` = ? ");
          $stmt->bind_param("ss",$email,$pass);
          $stmt->execute();
          $stmt->store_result();
          $stmt->bind_result($id,$emailz);
          $stmt->fetch();
            
          if($id == null){
                
          $msg="WRONG CREDENTIALS!";
          echo '<script type="text/javascript">alert("'.$msg.'");</script>';
          //header("Location: user-list.php");
          }else{
                
            $date_time = date('D, M j, Y \a\t g:ia');
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $description = "User $emailz has been logged into at IP $ip_address on $date_time";
            $stmt = $conn->prepare("INSERT INTO `logs`(`ip_address`,`description`,`date_time`) VALUES(?,?,?)");
            $stmt->bind_param("sss", $ip_address, $description, $date_time);
            $stmt->execute();

            $user_email_value = encrypt_decrypt("encrypt", $emailz);
           // $admin_password_value = encrypt_decrypt("encrypt", $newpassword);
           
            setcookie("p'4$8X]~Y)u7Sf:n", $user_email_value, time() + (10 * 365 * 24 * 60 * 60), "/");

            header("Location: index.php");

          }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User</title>

<?php include("includes/top.php");?>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a  class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">User</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small"style="display: none;">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation"  method="POST" action="">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">E</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12" style="display: none;">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="log" type="submit">Login</button>
                    </div>

                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php } ?>