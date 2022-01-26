<?php 
include("user/includes/dbconn.php");
//include("user/includes/encdec.php");

if(isset($_POST['calc'])){
  include("user/includes/dbconn.php");

  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $age = $_POST['age'];  




}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Nutri</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon." rel="icon">
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

    <?php include("header.php");?>
<!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Know your health status today!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Get to learn healthy options for your diet</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Get Started</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Calculate BMI</h3>

            <form action="" method="POST" class="php-email-form">
              <div class="row contact gy-4">

                <div class="col-md-6">
                  <input type="number" name="weight" class="form-control" placeholder="Weight (Kg)" value="" required>
                </div>

                <div class="col-md-6 ">
                  
                  <input type="number" class="form-control" name="height" placeholder="Height (Metres)" value="" required>
                </div>

                <div class="col-md-6">

                  <input type="number" class="form-control" name="age" placeholder="Age" required>
                </div>

                <div class="col-md-6">
                  <label for=""> Gender<span></span></label> <br>
                <select  class="form-control"  name="gender">
                  <option value="">--Select Gender --</option>
                  <option value="Male"> Male </option>
                  <option value="Female"> Female </option>
                </select>
                </div>

                <div class="col-md-12" style="display: none;">
                  <label for=""> Activity Level<span></span></label> <br>
                <select  class="form-control" >
                  <option value="">--Select Activity Level --</option>
                  <option value="Male"> Less Active </option>
                  <option value="Female"> Moderately Active</option>
                  <option value="Female"> Very Active</option>
                </select>
                </div>
                <div class="col-md-12 text-center">

                  <button name="calc" type="submit" style="  background: #4154f1;border: 0;padding: 10px 30px;color: #fff;transition: 0.4s;border-radius: 4px;">Calculate</button>
                </div>

              </div>
            </form> 
            <br>
              <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Get Personalised Info</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 align-items-center" data-aos="zoom-out" data-aos-delay="200">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box" style="color: #444444;background: #fafbff;padding: 30px;">
                  <i class="bi bi-grid" style="font-size: 38px;line-height: 0;color: #4154f1;"></i>
                  <h3 style="font-size: 20px;color: #012970;font-weight: 700;margin: 20px 0 10px 0;">BMI</h3>
                  <p style="padding: 0;line-height: 24px;font-size: 20px;margin-bottom: 0;">21.5</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box" style="color: #444444;background: #fafbff;padding: 30px;">
                  <i class="bi bi-grid" style="font-size: 38px;line-height: 0;color: #4154f1;"></i>
                  <h3 style="font-size: 20px;color: #012970;font-weight: 700;margin: 20px 0 10px 0;">BMR</h3>
                  <p style="padding: 0;line-height: 24px;font-size: 20px;margin-bottom: 0;">23.0</p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="info-box" style="color: #444444;background: #fafbff;padding: 30px;">
                  <i class="" style="font-size: 38px;line-height: 0;color: #4154f1;"></i>
                  <h3 style="font-size: 20px;color: #012970;font-weight: 700;margin: 20px 0 10px 0;">Conclusion</h3>
                  <p style="padding: 0;line-height: 24px;font-size: 14px;margin-bottom: 0;">info@example.com<br>contact@example.com</p>
                </div>

              </div>

            </div>
          </div>

        </div>
      </div>

    </section><!-- End About Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Recipes</h2>
          <p>Some Recipes</p>
        </header>

        <div class="row gy-4">

            <?php 
            include("user/includes/dbconn.php");
            include("user/includes/encdec.php");
            $stmt = $conn->prepare("SELECT * FROM `tblrawrecipes` ORDER BY `id` ASC LIMIT 6");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
            $array_recipes[] = $row;
            }
            //$numberrecipes = sizeof($array_recipes);
            for ($i=0; $i < 6; $i++) { 
              //$count = $i + 1; 
               $color= array("blue","orange","green","red","purple","pink");
              $count = $i; 
            ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box  <?php echo $color[$count];?>">
              <i class="ri-discuss-line icon"></i>
              <h3><?php echo ucwords($array_recipes [$i]['name']); ?></h3>
              <p>
                    <?php
                       $string = strip_tags($array_recipes[$i]['description']);
                        if (strlen($string) > 25) {
  
                            $stringCut = substr($string, 0, 60);
                            $endPoint = strrpos($stringCut, ' ');

                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        } echo ucfirst($string); ?>
                          
              </p>
              <a href="recipe-details.php?]~Y)u7Sf=<?php echo encrypt_decrypt("encrypt", $array_recipes[$i]['id']);?>" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <?php } ?>


        </div>

      </div>

    </section><!-- End Services Section -->


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