<?php 
include("includes/dbconn.php");
include("includes/encdec.php");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_COOKIE["w'4$8X]~Y)u7Sf:n"])){
    
    $em = $_COOKIE["w'4$8X]~Y)u7Sf:n"];
    $em = encrypt_decrypt("decrypt", $em);    
 
}else{

  header("Location: login.php");
} 

if(isset($_POST['reg'])){
  include("includes/dbconn.php");

        $name = $_POST['name'];
        $email = strtolower(str_replace(" ", "", $_POST['email']));
        $pass = sha1($_POST['pass']);
        $repass = sha1($_POST['repass']);
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $age = $_POST['age'];       

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


          $stmt = $conn->prepare("INSERT INTO `tblusers`(`name`,`email`,`status`,`password`,`date_joined`,`weight`,`height`,`age`) VALUES(?,?,?,?,?,?,?,?)");
          $stmt->bind_param("ssissiii",$name,$email,$status,$pass,$date_time,$weight,$height,$age);
          $stmt->execute(); 

          $date_time = date('D, M j, Y \a\t g:ia');
          $ip_address = $_SERVER['REMOTE_ADDR'];
          $description = "New User With Email: $email Registered.";
          $stmt = $conn->prepare("INSERT INTO logs(`ip_address`,`description`,`date_time`) VALUES(?,?,?)");
          $stmt->bind_param("sss", $ip_address, $description, $date_time);
          $stmt->execute();    

          /*
          $admin_password = encrypt_decrypt("encrypt", "admin_email");
          $admin_password_value = encrypt_decrypt("encrypt", $newpassword);
          
          setcookie($admin_password, $admin_password_value, time() + (10 * 365 * 24 * 60 * 60), "/");
          */

          $msg="New User Registered Successfully!";
          echo '<script type="text/javascript">alert("'.$msg.'");</script>';
          //header("Location: user-list.php"); 

          }else{
          $msg="PASSWORDS MISMATCH!";
          echo '<script type="text/javascript">alert("'.$msg.'");</script>';
          //header("Location: user-list.php");
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

  <title>Admin</title>

<?php include("includes/top.php");?>

</head>

<body>

  <!-- ======= Header ======= -->
<?php include("includes/header.php");?>

><!-- End Header -->

  <!-- ======= Sidebar ======= -->

<?php include("includes/side-bar.php");?>
<!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Users List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">User List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date joined</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
            <?php 

            $stmt = $conn->prepare("SELECT * FROM `tblusers` ORDER BY `id` ASC");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
            $array_users[] = $row;
            }
            $numberusers = sizeof($array_users);
            for ($i=0; $i < $numberusers; $i++) { 
              $count = $i + 1;
            ?>
                      <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $array_users[$i]['name']; ?></td>
                        <td><?php echo $array_users[$i]['email']; ?></td>
                        <td><?php echo $array_users[$i]['date_joined']; ?></td>
                        <td><?php if ($array_users[$i]['status'] == 1) {
                          $stausss = '<span class="badge bg-success">Active</span>'; echo $stausss;} else { $stausss = '<span class="badge bg-danger">Suspended</span>'; echo $stausss;} ?>  </td>
                      </tr>
            <?php } ?>

                    </tbody>
                  </table>
            </div>
          </div>

        </div>

        <div class="col-lg-8" >

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Register user</h5>
                  <!-- Change Password Form -->
                  <form method="POST" action="">

                    <div class="row mb-3">
                      <label for="" class="col-md-4 col-lg-3 col-form-label">Name </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id=""required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pass" type="password" class="form-control" id=""required>
                      </div>
                    </div>

                   <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="repass" type="password" class="form-control" id=""required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Weight (kg)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="weight" type="number" class="form-control" id=""required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Height (cm)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="height" type="number" class="form-control" id=""required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">age</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="age" type="number" class="form-control" id=""required>
                      </div>
                    </div>                    


                    <div class="text-center">
                      <button name="reg" type="submit" class="btn btn-primary">Register</button>
                    </div>
                  </form><!-- End Change Password Form -->

            </div>
          </div>

        </div>
      </div>

      <div class="row">
        
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  </footer><!-- End Footer -->

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