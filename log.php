<?php
include("functions/init.php");

if(!isset($_GET['dept']) && !isset($_GET['datte'])) {

    redirect("./");
    die();

} else {

    admin_details();

  $department = clean(escape($_GET['dept']));
  $dat      = clean(escape($_GET['datte']));

  if($dat == '' || $dat  == null) {

    $dater = date("Y-m-d");

  } else {

    $dater = $dat;
  }

}

?>
<!-- Responsive Table -->
<div class="card mb-5">
 <h5 class="card-header text-dark">Absentees -: <?php echo date('d M Y', strtotime($dater)); ?></h5>
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
        <?php echo absenteesbytype($department, $dater) ?>
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
       <?php latecomerbytype($department, $dater) ?>
       
     </tbody>
   </table>
 </div>
</div>
<!--/ Responsive Table -->

