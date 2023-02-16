<?php include("component/head.php"); ?>
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


          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
               
                <div class="col-lg-6 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card h-100">
                        <a href="./view">
                        <div class="card-body">
                          
                          <span class="fw-semibold d-block mb-1 text-dark">Total Users</span>
                          <h4 class="card-title mb-2 text-dark"><?php echo totalusers(); ?></h4>
                          <small class="text-primary fw-semibold ">View all <i class="bx bx-right-arrow-alt"></i></small>
                        </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <a href="./absentee">
                        <div class="card-body">
                          
                          <span class="fw-semibold d-block mb-1 text-dark">Absentee / Late Comers</span>
                          <h4 class="card-title mb-2 text-dark"><?php echo countabsentees()." / ".totallatecomer() ?></h4>
                          <small class="text-primary fw-semibold ">View all <i class="bx bx-right-arrow-alt"></i></small>
                        </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <a target="_blank" href="./expiry">
                        <div class="card-body">
                          
                          <span class="fw-semibold d-block mb-1 text-dark">Next Renewal</span>
                          
                          <h5 class="card-title mb-2 text-danger" id="demo"></h5>
                          <small class="text-primary fw-semibold ">Renew<i class="bx bx-right-arrow-alt"></i></small>
                        </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <a target="_blank" href="https://portal.nigeriabulksms.com/recharge">
                        <div class="card-body">
                          
                          <span class="fw-semibold d-block mb-1 text-dark">SMS Unit Balance</span>
                          <h3 class="card-title mb-2 text-dark"><?php bulksmsbalance(); ?></h3>
                          <small class="text-primary fw-semibold ">Recharge <i class="bx bx-right-arrow-alt"></i></small>
                        </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>  
              
              </div>

               <!-- Responsive Table -->
               <div class="card mb-5">
                <h5 class="card-header text-dark">Absentees</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>No. of times present</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php echo absentees(); ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Responsive Table -->

              <!-- Responsive Table -->
              <div class="card mb-5">
                <h5 class="card-header text-dark">Late Comers [Expected Resumption Time: <?php echo date('h:ia', strtotime($resmp = $GLOBALS['t_admins']['expectedtimein'])); ?>]</h5>
                <div class="table-responsive text-nowrap">  
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Time Resumed</th>
                        <th>No of times late (<?php echo date("M") ?>)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php latecomer() ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Responsive Table -->


              <!-- Responsive Table -->
              <div class="card mb-5">
                <h5 class="card-header text-dark">Birthdays</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                       <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Age</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <?php getbirthdays(); ?>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Responsive Table -->
              
            </div>


            <!-- / Content -->

            <!-- Footer -->
           
            <?php include("component/footer.php") ?>

            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
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