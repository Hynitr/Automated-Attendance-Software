<?php include("component/head.php"); 

if(!isset($_GET['cat'])) {

  redirect("./view");

  die();

} else {

  $cat = clean(escape($_GET['cat']));

  getallcarduser($cat);

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

                                  <!-- Register Card -->
                                  <div class="card col-3 me-3 mb-5">
                                        <div class="card-body justify-content-center text-center">
                                        
                                              <div class="">
                                                <img src="assets/img/<?php echo $logo ?>" class="img-responsive img-fluid mb-1" style="width: 30px">
                                                
                                              </div>

                                              <div class="col-12">
                                                <h6 style="font-size: 12px; margin-left: -1rem !important; margin-right: -1rem !important; margin-bottom: 0.2rem !important" class="text-dark fw-bold"><?php echo strtoupper($t_admins['school']) ?></h6>
                                                <p class="text-muted" style="font-size: 8px; margin-bottom: 0rem !important; color: #000 !important"><?php echo ucfirst($t_admins['addr']) ?></p>  
                                                <p class="text-muted" style="font-size: 6px; margin-top: 0rem !important; color: #000 !important"><?php echo ucfirst($t_admins['tel']) ?></p>  
                                              
                                              </div>




                                              <div>
                                                
                                              <img src="upload/passport/<?php echo $specific_user['Passport'] ?>" class="img-responsive circular-image mb-1" style="margin-left: -1rem !important; margin-right: -1rem !important;">
                                                   
                                              </div>
                                      
                                          
                                        </div>

                                        <div class="card-footer">

                                          <div class="row">

                                              <div class="col-3">

                                              <img src="upload/qrcode/<?php echo $specific_user['qrcode'] ?>" class="img-responsive" style="width:40px; margin-left: -1rem !important; margin-right: -1rem !important;">
                                                    
                                              </div>
                                              

                                              <div class="col-8 mt-1">
                                             
                                              <p id="nme" class="bg-dark py-2 px-3 fw-bold" style="font-size: 10px; margin-top: 0rem !important;margin-left: -1rem !important; margin-right: -1rem !important;"><?php echo ucwords($specific_user['Last Name']." ".$specific_user['First Name']) ?></p>  
                                        
                                              </div>
                                          </div>

                                     
                                      
                                          
                                          <div class="col-12 justify-content-center text-center" style="margin-top: -10% !important;">
                                            <small class="text-muted" style="font-size: 9px; margin-top: 0rem !important; color: #000 !important"><?php echo strtolower($t_admins['website']) ?></small>  
                                          </div>
                                        </div>
                                </div>
                                <!-- Register Card -->


                               <!-- Register Card -->
                              <div class="card col-3 bg-dark me-3 mb-5">
                                    <div class="card-body">
                                          <div class="col-12">
                                              
                                          <ul class="dotted-list" style="font-size: 10px; margin-top: 0rem !important;margin-left: -1rem !important; margin-right: -1rem !important;">
                                            <li class="col-10 mb-4 mt-3 fw-bold">This Identity Card is an official document and relates to the person described</li>
                                            <li class="col-10 mb-4 fw-bold">Impersonation, alternation, Destruction or transfer of the authorised holder to another person is a penal offence</li>
                                            <li class="col-10 mb-4 fw-bold">If found, kindly return to the address stated in front of this card</li>
                                          </ul>

                                                    
                                          </div>
                                    </div>

                              </div>

                            

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
