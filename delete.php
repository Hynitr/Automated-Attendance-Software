<?php include("component/head.php");

if(!isset($_GET['ref'])) {

    redirect();

    die();

} else {

    $ref = clean(escape($_GET['ref']));

    getspecificuser($ref);

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


          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Delete <?php echo $specific_user['Last Name']." ".$specific_user['First Name'] ?> </h4>
              <div class="row">
                
              <div class="row">

                    
                <div class="mb-5 mt-3 col-6 justify-content-center m-auto text-center">
                <img src="upload/passport/<?php echo $specific_user['Passport'] ?>" alt=" <?php echo $specific_user['Last Name']." ".$specific_user['First Name'] ?>" class="img-fluid img-responsive" width="150" />

                </div>

                <!-- Form controls -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                    <div class="mb-3" >
                        <label for="exampleFormControlInput1" class="form-label">Attendance ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="attdid" value="<?php echo $specific_user['AttendanceID'] ?>" disabled
                        />
                      </div>

                      <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input
                            type="email"
                            class="form-control"
                            id="fname" value="<?php echo $specific_user['First Name'] ?>"
                            placeholder="ABC" disabled
                            />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                            <input
                            type="email"
                            class="form-control"
                            id="lname" value="<?php echo $specific_user['Last Name'] ?>"
                            placeholder="XYZ" disabled
                            />
                        </div>
                      </div>
                    
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Gender</label>
                        <select class="form-select" id="gender" aria-label="Default select example" disabled>
                        <option><?php echo $specific_user['Gender'] ?></option>
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
                            id="tel1" value="<?php echo $specific_user['Telephone1'] ?>"
                            placeholder="0701234578" disabled
                            />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">Telephone 2</label>
                            <input
                            type="number"
                            class="form-control"
                            id="tel2" value="<?php echo $specific_user['Telephone2'] ?>"
                            placeholder="09037384374" disabled
                            />
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                            <input
                            type="date"
                            class="form-control"
                            id="dob" value="<?php echo $specific_user['dob'] ?>" disabled
                            />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleFormControlInput1" class="form-label"> Department</label>
                            <select class="form-select" id="category" aria-label="Default select example" disabled>
                             <option><?php echo $specific_user['department'] ?></option>
                            <?php echo getcategories(); ?>
                        </select>
                        </div>
                      </div>

                     
                      <div>
                        <label for="exampleFormControlTextarea1" class="form-label mb-3">Address</label>
                        <textarea class="form-control" id="address" rows="3" disabled><?php echo $specific_user['Address'] ?></textarea>
                      </div>

                      <h5 class="card-header">Delete Records</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete the above records?</h6>
                          <p class="mb-0">Once you delete, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form>
                        
                        <button type="button" id="delete" class="btn btn-danger deactivate-account">Delete All Records</button>
                      </form>
                    </div>
                    
                    </div>
                      </div>
                      

                    
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


<?php
}


if(isset($_SESSION['notify'])) {

    echo '
    <script>
    $(toastr.clear());
    $(toastr.success("'.$_SESSION['notify'].'"));
    </script>
    ';

    unset($_SESSION['notify']);
}
?>