<?php include("component/head.php"); 

if(!isset($_GET['cat'])) {

  redirect("./view");

  die();

} else {

  $cat = clean(escape($_GET['cat']));

  

}

?>

<style>

  @font-face {
    font-family: inter;
    src: url('assets/font/Inter-Medium.ttf');
}


  .card {

    width: 2.25in !important;
    height: 3.5in !important;
    background-image: url("assets/img/bgs.png");
    background-size: cover;
}

.bg-dark {

  background-color: #000 !important;
  color: #fff !important;
}

.text-dark {

  color: #000 !important;
  font-family: inter;
}

.card-footer {

  margin-top: -22% !important;
}
#nme {

  border-radius: 0% 5% 5% 0% !important;
}

.circular-image {
    width: 140px; /* set a fixed width */
    height: 140px; /* set a fixed height */
    border-radius: 50%; /* set the radius to half the width and height to create a circle */
     /* this will make sure the image covers the entire area */
}

</style>
  <body>


              <!-- Content wrapper -->
              <div class="container">

                    

                      <div class="row mt-5 m-auto justify-content-center" id="idcard">

                              
                      <?php echo getallcarduser($cat); ?>
                            

                      </div>

                    
           
                      <div class="row mt-5 m-auto text-center justify-content-center">
                             

                              <div class="col-6">
                              <button class="btn m-auto btn-primary w-100" onclick="printPage();">Print</button>
                              </div>


                              <div class="col-6">
                              <button class="btn m-auto btn-primary w-100" onclick="window.history.back();">Go Back</button>
                              </div>


                      </div>


             
              </div>


              <br/><br/><br/><br/>



              <footer class="content-footer footer fixed-bottom">
              <div class="d-flex flex-wrap justify-content-center text-center py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  <small> Developed by <a href="https://www.google.com/search?client=opera&q=abolade+greatness&sourceid=opera&ie=UTF-8&oe=UTF-8" target="_blank" class="footer-link fw-bolder">Abolade Greatness</a> | Powered by
                  <a href="https://hynitr.com" target="_blank" class="footer-link fw-bolder">Hynitr</a></small>
                </div>
                <p id="demo" hidden></p>
              </div>
              </footer>


    

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
   
    <script>
      function printPage() {
          var printArea = document.getElementById("idcard");
          window.print(printArea);
      }
    </script> 


  </body>
</html>
