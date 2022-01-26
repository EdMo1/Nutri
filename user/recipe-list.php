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
      <h1>Recipe List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Recipe List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recipes</h5>
                  <table class="table table-border datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Recipe Id</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Nutrition Data</th>
                        <th scope="col">No. of Steps</th>
                        <th scope="col">Steps</th>
                        <th scope="col">Description</th>
                        <th scope="col">Ingredients</th>
                        <th scope="col">No. of Ingredients</th>
                        <th scope="col">Contributor Id</th>
                      </tr>
                    </thead>
                    <tbody>

            <?php 

            $stmt = $conn->prepare("SELECT * FROM `tblrawrecipes` ORDER BY `id` ASC LIMIT 10000");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
            $array_recipes[] = $row;
            }
            $numberrecipes = sizeof($array_recipes);
            for ($i=0; $i < $numberrecipes; $i++) { 
              $count = $i + 1;
            ?>
                      <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $array_recipes[$i]['name']; ?></td>
                        <td><?php echo $array_recipes[$i]['recipe_id']; ?></td>
                        <td>
                    <?php
                       $string = strip_tags($array_recipes[$i]['nutrition_tags']);
                        if (strlen($string) > 25) {
  
                            $stringCut = substr($string, 0, 30);
                            $endPoint = strrpos($stringCut, ' ');

                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        } echo $string; ?>
                          </td>
                        <td>
                    <?php
                       $string = strip_tags($array_recipes[$i]['nutrition_info']);
                        if (strlen($string) > 25) {
  
                            $stringCut = substr($string, 0, 30);
                            $endPoint = strrpos($stringCut, ' ');

                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        } echo $string; ?>
                        </td>
                        <td><?php echo $array_recipes[$i]['no_of_steps']; ?></td>
                        <td>
                    <?php
                       $string = strip_tags($array_recipes[$i]['steps']);
                        if (strlen($string) > 25) {
  
                            $stringCut = substr($string, 0, 30);
                            $endPoint = strrpos($stringCut, ' ');

                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        } echo $string; ?>
                        </td>
                        <td>
                    <?php
                       $string = strip_tags($array_recipes[$i]['description']);
                        if (strlen($string) > 25) {
  
                            $stringCut = substr($string, 0, 30);
                            $endPoint = strrpos($stringCut, ' ');

                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        } echo $string; ?>
                        </td>
                        <td>
                    <?php
                       $string = strip_tags($array_recipes[$i]['ingredients']);
                        if (strlen($string) > 25) {
  
                            $stringCut = substr($string, 0, 30);
                            $endPoint = strrpos($stringCut, ' ');

                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        } echo $string; ?>
                        </td>
                        <td><?php echo $array_recipes[$i]['no_of_ingredients']; ?></td>
                        <td><?php echo $array_recipes[$i]['contributor_id']; ?></td>

                      </tr>
          <?php }?> 
                    </tbody>
                  </table>
            </div>
          </div>

        </div>

        <div class="col-lg-6" style="display: none;">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Example Card</h5>
              <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
            </div>
          </div>

        </div>
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