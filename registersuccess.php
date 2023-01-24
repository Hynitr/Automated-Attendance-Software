<?php include("component/head.php") ?>
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Register Users</h4>

              <div class="row">
                
        

                <!-- Form controls -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Attendance ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="attdid" value="<?php echo strtoupper($t_admins['alias'])."/ATTD/".mt_rand(99, 9999); ?>" disabled
                        />
                      </div>

                      <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input
                            type="email"
                            class="form-control"
                            id="fname"
                            placeholder="ABC"
                            />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                            <input
                            type="email"
                            class="form-control"
                            id="lname"
                            placeholder="XYZ"
                            />
                        </div>
                      </div>
                    
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Gender</label>
                        <select class="form-select" id="gender" aria-label="Default select example">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      

                      <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">Telephone 1</label>
                            <input
                            type="number"
                            class="form-control"
                            id="tel1"
                            placeholder="0701234578"
                            />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">Telephone 2</label>
                            <input
                            type="number"
                            class="form-control"
                            id="tel2"
                            placeholder="09037384374"
                            />
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                            <input
                            type="date"
                            class="form-control"
                            id="dob"
                            />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label"> Department</label>
                            <select class="form-select" id="category" aria-label="Default select example">
                            <?php echo getcategories(); ?>
                        </select>
                        </div>
                      </div>

                     
                      <div>
                        <label for="exampleFormControlTextarea1" class="form-label mb-3">Address</label>
                        <textarea class="form-control" id="address" rows="3"></textarea>
                      </div>

                      <div class="mb-3 mt-3">
                        <label for="formFile" class="form-label">Passport (jpg format only)</label>
                        <input class="form-control" type="file" id="passprt" />
                      </div>

                      <button id="register" type="button" class="btn btn-primary">Submit Details</button>
                    </div>
                  </div>
                </div>

              </div>
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
