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
              <h4 class="fw-bold py-3 mb-4">Setup Profile</h4>

              <div class="row">
                <div class="col-md-12">
                
                  <div class="card mb-4">
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">School Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="schoolname"
                              value="<?php echo $t_admins['school'] ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Website URL</label>
                            <input class="form-control" type="text" id="website" value="<?php echo $t_admins['website'] ?>"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Alias</label>
                            <input
                              class="form-control"
                              type="text"
                              id="alias"
                              value="<?php echo $t_admins['alias'] ?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Telephone (Separate multiple numbers using comma)</label>
                            <input
                              type="text"
                              class="form-control"
                              id="telephone"
                              value="<?php echo $t_admins['tel'] ?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">School Address</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                class="form-control"
                                id="address"
                                value="<?php echo $t_admins['addr'] ?>"
                                maxlength="35"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Bulk SMS Name</label>
                            <input class="form-control" type="text" id="blksmnme" value="<?php echo $t_admins['blksmsname'] ?>" maxlength="7"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Bulk SMS Email</label>
                            <input class="form-control" type="email" id="blksmseml" value="<?php echo $t_admins['blkuser'] ?>"/>
                          </div>
                          <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="blkpwrd">Bulk SMS Password</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="password"
                                id="blkpword"
                                class="form-control"
                                value="<?php echo $t_admins['blkpword'] ?>"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              />
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">WhatsApp Token</label>
                            <input class="form-control" type="text" id="whtkn" value="<?php echo $t_admins['token'] ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">WhatsApp InstanceID</label>
                            <input
                              type="text"
                              class="form-control"
                              id="intanceid"
                              value="<?php echo $t_admins['instanceid'] ?>"
                            />
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="state" class="form-label">Expected Time-in</label>
                            <input class="form-control" type="time" id="timein" value="<?php echo $t_admins['expectedtimein'] ?>" />
                          </div>

                       
                          
                        </div>
                        <div class="mt-2">
                          <button type="button" id="profchange" class="btn btn-primary me-2">Save changes</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
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
    <script src="js/toastr.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <!-- Page JS -->
    <script>
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    </script>
    
    <script src="ajax.js"></script>

  </body>
</html>