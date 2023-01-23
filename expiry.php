<?php
include("functions/init.php");

admin_details();
?>
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

    <title>Renew | Automated Attendance System</title>

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

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
             
              <!-- /Logo -->
              <img src='assets/img/logo.png' width="50" class="img-responsive img-fluid">
              <h4 class="mb-2 mt-3">Renew Your Software</h4>
              <p class="mb-4">Click on the button below to automatically renew your software</p>

              <p class="mb-4" id="email" hidden><?php echo $t_admins['blkuser'] ?></p>
              <p class="mb-4" id="ref" hidden><?php echo md5(rand()) ?></p>
              <p class="mb-4" id="pkk" hidden><?php echo $t_admins['pkkey'] ?></p>
              <p class="mb-4" id="amt" hidden><?php echo $t_admins['renewamt'] ?></p>


             <button type="button" class="btn btn-primary d-grid w-100" onclick="payWithPaystack()">Renew Software</button>
              
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
    <script src="https://js.paystack.co/v1/inline.js"></script> 

        <script>
            function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: document.getElementById('pkk').innerHTML, // Replace with your public key
                email: document.getElementById('email').innerHTML,
                amount: document.getElementById('amt').innerHTML * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                ref: document.getElementById('ref').innerHTML,// Replace with a reference you generated
                callback: function(response) {
                //this happens after the payment is completed successfully
                var reference = response.reference;
                window.location.assign('./paid?ref='+ reference);
                // Make an AJAX call to your server with the reference to verify the transaction
                },
                onClose: function() {
                alert('Transaction was not completed, window closed.');
                },
            });
            handler.openIframe();
            }
        </script>
  </body>
</html>
