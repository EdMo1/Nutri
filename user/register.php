<?php 
include("includes/dbconn.php");
include("includes/encdec.php");

if(isset($_COOKIE["p'4$8X]~Y)u7Sf:n"])){
     
  header("Location: index.php"); 
}else{


if(isset($_POST['reg'])){
  include("includes/dbconn.php");

        $name = strtolower($_POST['name']);
        $email = strtolower(str_replace(" ", "", $_POST['email']));
        $pass = sha1($_POST['pass']);
        $repass = sha1($_POST['repass']);
        //$weight = $_POST['weight'];
        //$height = $_POST['height'];
        //$age = $_POST['age'];       

        $status = 1;
        $date_time = date('D, M j, Y \a\t g:ia');

        $stmt = $conn->prepare("SELECT `id` FROM `tblusers` WHERE `email` = ? LIMIT 1");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_already_exists);
        $stmt->fetch();      

        if ($user_already_exists == null) {

          if ($pass == $repass) {   


          $stmt = $conn->prepare("INSERT INTO `tblusers`(`name`,`email`,`status`,`password`,`date_joined`) VALUES(?,?,?,?,?)");
          $stmt->bind_param("ssiss",$name,$email,$status,$pass,$date_time);
          $stmt->execute(); 

          $date_time = date('D, M j, Y \a\t g:ia');
          $ip_address = $_SERVER['REMOTE_ADDR'];
          $description = "New User With Email: $email Registered.";
          $stmt = $conn->prepare("INSERT INTO logs(`ip_address`,`description`,`date_time`) VALUES(?,?,?)");
          $stmt->bind_param("sss", $ip_address, $description, $date_time);
          $stmt->execute();    

          $msg="New User Registered Successfully!";
          echo '<script type="text/javascript">alert("'.$msg.'");</script>';

            $user_email_value = encrypt_decrypt("encrypt", $email);
            // $admin_password_value = encrypt_decrypt("encrypt", $newpassword);         
            setcookie("p'4$8X]~Y)u7Sf:n", $user_email_value, time() + (10 * 365 * 24 * 60 * 60), "/");

            header("Location: index.php");

          }else{
          $msg="PASSWORDS MISMATCH!";
          echo '<script type="text/javascript">alert("'.$msg.'");</script>';
          //header("Location: index.php");
          }       
         
        }else{
          $msg="USER EMAIL ALREADY EXISTS!";
          echo '<script type="text/javascript">alert("'.$msg.'");</script>';
          //header("Location: user-list.php");
        }        


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your details to create account</p>
                  </div>

                  <form method="POST" action="" class="row g-3 needs-validation">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Re-enter Password</label>
                      <input type="password" name="repass" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please re-enter your password!</div>
                    </div>


                    <div class="col-12">
                      <button name="reg" type="submit" class="btn btn-primary w-100" >Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
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