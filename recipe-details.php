<?php 
include("user/includes/dbconn.php");
include("user/includes/encdec.php");


if(isset($_GET["]~Y)u7Sf"])){
    
    $idz = $_GET["]~Y)u7Sf"];
    $idz = encrypt_decrypt("decrypt", $idz);    
 
}else{

  header("Location: index.php");
} 

        $stmt = $conn->prepare("SELECT `name`,`mins_to_prepare`,`nutrition_tags`,`nutrition_info`,`no_of_steps`,`steps`,`description`,`ingredients`,`no_of_ingredients` FROM `tblrawrecipes` WHERE `id` = ?");
        $stmt->bind_param("i", $idz);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($name,$mins,$tags,$info,$noofsteps,$steps,$description,$ingredients,$noofingredients);
        $stmt->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Recipe Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Nutri</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
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
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Recipe Details</li>
        </ol>
        <h2><?php echo ucwords($name);?></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-info " style="">
 
               <h3><?php echo ucwords($name);?></h3>
               <h4 style="  font-size: 17px; font-weight: 700;margin-bottom: 20px;padding-bottom: 20px;">Description: </h4>
               <p><?php echo ucfirst($description);?> <br>
               Mins to prepare: <b><?php echo ucfirst($mins);?>'</b></p>
               <h4 style="  font-size: 17px; font-weight: 700;margin-bottom: 20px;padding-bottom: 20px;">Ingredients:</h4>
               <p>
                <ul>
             <?php 
            include("user/includes/dbconn.php");
            
            $stmt = $conn->prepare("SELECT `ingredients` FROM `tblrawrecipes` WHERE `id` =? ");
            $stmt->bind_param("i", $idz);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($ing);
            $stmt->fetch();

            if ($ing != null) {
              $array_ing = str_replace(str_split("\\/:*?'[]<>|"), "", explode(",", $ing));

              $no_of_ing = sizeof($array_ing);

              for ($i=0; $i < $no_of_ing; $i++) { 
                ?>

                <li style="display: flex;align-items: center; color: #012970;"><i class="bi bi-chevron-right" style="padding-right: 20px 0;"></i><?php echo ucwords($array_ing[$i]);?></li>

            <?php }
            }else{

            }     
                   
            ?>
                                               
                </ul>
                </p>
               <h4 style="  font-size: 17px; font-weight: 700;margin-bottom: 15px;padding-bottom: 10px;">Steps: (<?php echo $noofsteps;?> Steps)</h4>
               <p>
                 <ul >

             <?php 
            include("user/includes/dbconn.php");
            
            $stmt = $conn->prepare("SELECT `steps` FROM `tblrawrecipes` WHERE `id` =? ");
            $stmt->bind_param("i", $idz);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($stp);
            $stmt->fetch();

            if ($stp != null) {
              $array_stp = str_replace(str_split("\\/:*?',[]<>|"), "", explode("'", $stp));

              $no_of_stp = sizeof($array_stp);

              for ($i=0; $i < $no_of_stp; $i++) { 
                ?>

                <li style="display: flex;align-items: center; color: #012970;"><?php echo ucfirst($array_stp[$i]);?></li>

            <?php }
            }else{

            }     
                   
            ?>
                 </ul>
               </p>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Nutrition information</h3>
              <ul>
             <?php 
            include("user/includes/dbconn.php");
            
            $stmt = $conn->prepare("SELECT `nutrition_info` FROM `tblrawrecipes` WHERE `id` =? ");
            $stmt->bind_param("i", $idz);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($nv);
            $stmt->fetch();

            if ($nv != null) {
              $array_nv = str_replace(str_split("\\/:*?',[]<>|"), "", explode(",", $nv));

            }
                ?>

               
                <li><strong>Calories</strong>: <?php echo ($array_nv[0]);?></li>
                <li><strong>Total Fat (PDV)</strong>: <?php echo ($array_nv[1]);?></li>
                <li><strong>Sugar (PDV)</strong>: <?php echo ($array_nv[2]);?></li>
                <li><strong>Sodium (PDV)</strong>: <?php echo ($array_nv[3]);?></li>
                <li><strong>Protein (PDV)</strong>: <?php echo ($array_nv[4]);?></li>
                <li><strong>Saturated Fat</strong>: <?php echo ($array_nv[5]);?></li>
                <li><strong>Total Carbohydrates (PDV)</strong>: <?php echo ($array_nv[6]);?></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2></h2>
              <p>

              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <?php include("footer.php");?>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>