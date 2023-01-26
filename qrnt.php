<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Sign-in | Automated Attendance System</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-4.min.css" />
    <link href="assets/css/toastr.css" rel="stylesheet"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <?php

    include("functions/init.php");
    validateqrid();

    ?>

    

    <div class="container-xxl" id="marked" style="display: none">
            <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                <div class="card-body">
                    <!-- Logo -->   
                
                    <!-- /Logo -->
                    <img src="assets/img/logo.png" width="50" class="img-responsive img-fluid">
                    <h4 class="text-success fw-bold mb-2 mt-3">Attendance Marked In</h4>
                    <p class="mb-4">User have been marked in </p>

                    <hr/>
                    <footer class="content-footer footer">
                    <div class="d-flex flex-wrap justify-content-center text-center py-2 flex-md-row flex-column">
                      <div class="mb-2 mb-md-0">
                        <small> Developed by <a href="https://www.google.com/search?client=opera&q=abolade+greatness&sourceid=opera&ie=UTF-8&oe=UTF-8" target="_blank" class="footer-link fw-bolder">Abolade Greatness</a> | Powered by
                        <a href="https://hynitr.com" target="_blank" class="footer-link fw-bolder">Hynitr</a></small>
                      </div>
                      <p id="demo" hidden></p>
                    </div>
                    </footer>

                </div>
                </div>
                <!-- Register Card -->
            </div>
            </div>
    </div>


    <div class="container-xxl" id="markedout" style="display: none">
            <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                <div class="card-body">
                    <!-- Logo -->   
                
                    <!-- /Logo -->
                    <img src="assets/img/logo.png" width="50" class="img-responsive img-fluid">
                    <h4 class="text-success fw-bold mb-2 mt-3">Attendance Marked Out</h4>
                    <p class="mb-4">User have been marked out </p>

                    <hr/>
                    <footer class="content-footer footer">
                    <div class="d-flex flex-wrap justify-content-center text-center py-2 flex-md-row flex-column">
                      <div class="mb-2 mb-md-0">
                        <small> Developed by <a href="https://www.google.com/search?client=opera&q=abolade+greatness&sourceid=opera&ie=UTF-8&oe=UTF-8" target="_blank" class="footer-link fw-bolder">Abolade Greatness</a> | Powered by
                        <a href="https://hynitr.com" target="_blank" class="footer-link fw-bolder">Hynitr</a></small>
                      </div>
                      <p id="demo" hidden></p>
                    </div>
                    </footer>
                </div>
                </div>
                <!-- Register Card -->
            </div>
            </div>
    </div>

    

    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="js/toastr.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

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
