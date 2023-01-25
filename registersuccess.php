<?php include("component/head.php"); 

if(!isset($_GET['ref'])) {

  redirect("./register");

  die();

} else {

  $ref = clean(escape($_GET['ref']));

}

?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

       <?php include("component/aside.php") ?>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include("component/nav.php") ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
             
              <!-- /Logo -->
            
              <h4 class="mb-2 mt-3">Registration Successful</h4>
              <p class="mb-4">User registered successfully.</p>

              <p class="mb-4" id="email" hidden><?php echo $t_admins['blkuser'] ?></p>
              <p class="mb-4" id="ref" hidden><?php echo md5(rand()) ?></p>
              <p class="mb-4" id="pkk" hidden><?php echo $t_admins['pkkey'] ?></p>
              <p class="mb-4" id="amt" hidden><?php echo $t_admins['renewamt'] ?></p>

              <div class="row container">
                <div class="col-6">
                <a href="./register" type="button" class="btn btn-primary d-grid w-100">Register New User</a>
                </div>

                <div class="col-6">
                <a href="./idcard?id=<?php echo $ref ?>" type="button" class="btn btn-primary d-grid w-100">Download ID Card</a>
                </div>
             
              </div>
            
              
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

          
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
   

  </body>
</html>
