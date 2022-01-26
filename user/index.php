<?php 
include("includes/dbconn.php");
include("includes/encdec.php");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(isset($_COOKIE["p'4$8X]~Y)u7Sf:n"])){
    
    $em = $_COOKIE["p'4$8X]~Y)u7Sf:n"];
    $em = encrypt_decrypt("decrypt", $em);    
 
}else{

  header("Location: login.php");
}  

        $stmt = $conn->prepare("SELECT `name`,`email`,`age`,`weight`,`height` FROM `tblusers` WHERE `email` = ?");
        $stmt->bind_param("s", $em);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name,$email,$age,$weight,$height);
        $stmt->fetch();

$sql="SELECT * FROM tblusers";
$result=mysqli_query($conn,$sql);
$total_users = mysqli_num_rows($result);

$sql="SELECT * FROM tblrawrecipes";
$result=mysqli_query($conn,$sql);
$total_recipes = mysqli_num_rows($result);



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

  <!-- ======= Header ======= -->
<?php include("includes/header.php");?>

><!-- End Header -->

  <!-- ======= Sidebar ======= -->

<?php include("includes/side-bar.php");?>
<!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">BMI <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php //echo number_format($bmi); ?> 21</h6>


                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">



                <div class="card-body">
                  <h5 class="card-title">BMR <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-data"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php //echo number_format($bmr) ?> 25</h6>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12" style="display: none;">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body" >
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Recent Sales -->
            <div class="col-12" >

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Calculate BMI/BMR</h5>
                  <!-- Change Password Form -->
                  <form method="POST" action="">

                    <div class="row mb-3" style="display:none;">
                      <label for="" class="col-md-4 col-lg-3 col-form-label">Name </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="" >
                      </div>
                    </div>

                    <div class="row mb-3" style="display:none;">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Weight (kg)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="weight" type="number" class="form-control" id="" value="<?php echo $weight; ?>"required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Height (cm)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="height" type="number" class="form-control" id="" value="<?php echo $height; ?>"required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">age</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="age" type="number" class="form-control" id=""  value="<?php echo $age; ?>"required>
                      </div>
                    </div>                    


                    <div class="text-center">
                      <button name="calculate" type="submit" class="btn btn-primary">Calculate</button>
                    </div>
                  </form><!-- End Change Password Form -->

            </div>
          </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

        </div><!-- End Right side columns -->

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