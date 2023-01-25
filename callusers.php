<?php

include("functions/init.php");

if(!isset($_GET['cat'])) {

    echo "<p class='text-danger'>invalid request</p>";

} else {


    $cat = clean(escape($_GET['cat']));

    if($cat == 'Select Option') {

      echo "<p class='text-danger'>Please select an option</p>";

    } else {


?>


               <!-- Responsive Table -->
               <div class="card mb-5">
                <h5 class="card-header text-dark"><?php echo $cat ?></h5>
                <div class="container table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>D.O.B</th>
                        <th>Gender</th>
                        <th>Tel 1 / Tel 2</th>
                        <th>Address</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php echo getcategoriesbytype($cat); ?>
                      
                    </tbody>
                  </table>
                </div>
                </div>
              <!--/ Responsive Table -->

<?php
}
}
?>