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

            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> View Users</h4>

                <!-- Form controls -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                    <div class="mb-3 col-12">
                            <label for="exampleFormControlInput1" class="form-label"> Select Department</label>
                            <select class="form-select" id="category" aria-label="Default select example">
                            <option>Select Option</option>
                            <?php echo getcategories(); ?>
                        </select>
                        </div>

                    </div>
                  </div>
                </div>
              

                <div id="res"></div>

              
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
    
		<script>
		document.getElementById('category').addEventListener('change', myfun);

       

		function myfun()
		{

      var category = $("#category").val();

			var xhr = new  XMLHttpRequest();    
			xhr.open('GET', './callusers?cat='+ category, true);

			xhr.onload = function ()
			{
				if (xhr.status == 200) {
					//document.write(this.responseText);
					document.getElementById('res').innerHTML=xhr.responseText;
				} else {

				  document.getElementById('res').innerHTML="Invalid Request";
				}
			}

			xhr.send();
		}
	</script>
 

  </body>
</html>

<?php
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