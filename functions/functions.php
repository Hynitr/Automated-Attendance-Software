<?php

/*************helper functions***************/

function clean($string) {

    return htmlentities($string);
}

function redirect($location) {

    return header("Location: {$location}");
}



// DASHBOARD FUNCTIONS FOR USER
function admin_details() {

    if(!isset($_SESSION['login'])) {

        redirect("./signin");

        die();

    } else {

        $data = $_SESSION['login'];

        //users details
        $sql = "SELECT * FROM `admin`";
        $rsl = query($sql);

        $GLOBALS['t_admins'] = mysqli_fetch_array($rsl);

    }
}



function getlogo() {

     //users details
     $sql = "SELECT * FROM `admin`";
     $rsl = query($sql);

     $row = mysqli_fetch_array($rsl);

     $GLOBALS['logo'] = $row['logo'];
}


//signin admin
if(isset($_POST['username']) && isset($_POST['password'])) {

    $username = clean(escape($_POST['username']));
    $password = md5(clean(escape($_POST['password'])));

    $sql ="SELECT * FROM `admin` WHERE `password` = '$password' AND `Admin No.` = '$username'";
    $res = query($sql);

    if(row_count($res) == 1) {

        $_SESSION['login'] = $username;
        echo '
        Logging in...
        <script>
        window.location.assign("./");
        </script>
        ';

    } else {

        echo '
        <script>
        $(toastr.clear());
        $(toastr.error("Invalid Username or Password"));
        $("#lsub").html("Sign in");
        </script>
        ';

    }

}


//register users
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['attdid']) && isset($_POST['gender']) && isset($_POST['tel1']) && isset($_POST['tel2']) && isset($_POST['dob']) && isset($_POST['category']) && isset($_POST['address']) && isset($_FILES['passport'])) {

    admin_details();



    $fname      = clean(escape($_POST['fname']));
    $lname      = clean(escape($_POST['lname']));
    $attdid     = clean(escape($_POST['attdid']));
    $gender     = clean(escape($_POST['gender']));
    $tel1       = clean(escape($_POST['tel1']));
    $tel2       = clean(escape($_POST['tel2']));
    $dob        = $_POST['dob'];
    $category   = clean(escape($_POST['category']));
    $address    = clean(escape($_POST['address']));

    $passport   = $_FILES['passport'];


    //submit passport

    $target_dir = "../upload/passport/";
    $target_file =  basename($_FILES["passport"]["name"]);
    $targetFilePath = $target_dir . $target_file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    $date = date("Y-m-d");






    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "jpeg") {

        echo '
        <script>
        $(toastr.clear());
        $(toastr.error("Sorry, only JPG and JPEG files are allowed."));
        </script>
        ';

        $uploadOk = 0;
    } else {
    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

            echo '
            <script>
            $(toastr.clear());
            $(toastr.error("Sorry, the passport was not uploaded."));
            </script>
            ';

            
        // if everything is ok, try to upload file
        } else {


            
            move_uploaded_file($_FILES["passport"]["tmp_name"], $targetFilePath);


                //QR CODE
                $d = md5($attdid);
                $pass = str_replace('/', '', $attdid);
                $dname = "$pass.png";
                
                //set it to writable location, a place for temp generated PNG files
                $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
                
                //html PNG location prefix
                $PNG_WEB_DIR = '../upload/qrcode/';
                
                include "../Qr/qrlib.php";    


                //ofcourse we need rights to create temp dir
                if (!file_exists($PNG_TEMP_DIR))
                mkdir($PNG_TEMP_DIR);
                
                
                $filename = $PNG_WEB_DIR.$dname;
                
                //processing form input
                //remember to sanitize user input in real-life solution !!!
                $errorCorrectionLevel = 'H'; 

                $matrixPointSize = 4;

               
                //generate unqiue ID
                QRcode::png($GLOBALS['t_admins']['website'].'/qrnt?id='.$d.'', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    


                // benchmark
                QRtools::timeBenchmark();  
                    

                $sql = "INSERT INTO `users` (`First Name`, `Last Name`, `AttendanceID`, `Gender`, `Telephone1`, `Telephone2`, `dob`, `department`, `address`, `Datereg`, `Passport`, `qrcode`, `qrid`) VALUES ('$fname', '$lname', '$attdid', '$gender', '$tel1', '$tel2', '$dob', '$category', '$address', '$date', '$target_file', '$dname', '$d')";
                $res = query($sql);

                echo '
                <script>
                $(toastr.clear());
                $(toastr.success("Upload Complete..."));
                location.assign("./registersuccess?ref='.$d.'");
                </script>
                ';


        }
        }
}



//edit users    
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['attdid']) && isset($_POST['gender']) && isset($_POST['tel1']) && isset($_POST['tel2']) && isset($_POST['dob']) && isset($_POST['category']) && isset($_POST['address']) && isset($_POST['roletype']) || isset($_FILES['edpassport'])) {

    admin_details();

    
    $fname      = clean(escape($_POST['fname']));
    $lname      = clean(escape($_POST['lname']));
    $attdid     = clean(escape($_POST['attdid']));
    $gender     = clean(escape($_POST['gender']));
    $tel1       = clean(escape($_POST['tel1']));
    $tel2       = clean(escape($_POST['tel2']));
    $dob        = $_POST['dob'];
    $category   = clean(escape($_POST['category']));
    $address    = clean(escape($_POST['address']));  
    

     //update db
     $sql = "UPDATE users SET `First Name`='$fname', `Last Name`='$lname', `Gender`='$gender', `Telephone1`='$tel1', `Telephone2`='$tel2', `dob`='$dob', `department`='$category', `address`='$address' WHERE `AttendanceID`='$attdid'";
     $res = query($sql);
    

    if(isset($_FILES['edpassport'])) {

        
            $target_dir = "../upload/passport/";
            $target_file =  basename($_FILES["edpassport"]["name"]);
            $targetFilePath = $target_dir . $target_file;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 

            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "jpeg") {

                echo '
                <script>
                $(toastr.clear());
                $(toastr.error("Sorry, only JPG and JPEG files are allowed."));
                </script>
                ';

                $uploadOk = 0;
                } else {
                // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {

                        echo '
                        <script>
                        $(toastr.clear());
                        $(toastr.error("Sorry, the passport was not uploaded."));
                        </script>
                        ';

                    
                // if everything is ok, try to upload file
                } else {
                    
                    move_uploaded_file($_FILES["edpassport"]["tmp_name"], $targetFilePath);

                    //update file in db

                    $ssl = "UPDATE users SET `Passport`='$target_file' WHERE `AttendanceID`='$attdid'";
                    $ress = query($ssl);


                }
                
            }

    }


    //create notification
    $notifydata = 'Updated Successfully';
    notifyuser($notifydata);
           
    echo '
    <script>
    $(toastr.clear());
    $(toastr.success("Updating..."));
    location.assign("./edit?ref='.$attdid.'");
    </script>
    ';

}  


//delete users
if(isset($_POST['delattdid']) && isset($_POST['roletype'])) {

    $attdid     = clean(escape($_POST['delattdid']));
    $roletype   = clean(escape($_POST['roletype']));


    if($roletype === 'delete') {

        $ref = $attdid;

        getspecificuser($ref);


        $passport = $GLOBALS['specific_user']['Passport'];
        $qrcode = $GLOBALS['specific_user']['qrcode'];


        //delete files from every folder
        unlink("../upload/passport/$passport");
        unlink("../upload/qrcode/$qrcode");

        
        $sql = "DELETE FROM `users` WHERE `AttendanceID` = '$attdid'";
        $res = query($sql);


         //create notification
        $notifydata = 'Deleted Successfully';
        notifyuser($notifydata);
            
        echo '
        <script>
        $(toastr.clear());
        $(toastr.success("Deleting..."));
        location.assign("./view");
        </script>
        ';



    } else {

        echo "Invalid Request";
    }
    
}


//validate secuirtykey
if(isset($_POST['securitykeyy']) && isset($_POST['qrid'])) {

    $keyy = md5(clean(escape($_POST['securitykeyy'])));
    $qrid = clean(escape($_POST['qrid']));
 
    validatesecuritykey($keyy, $qrid);
 
}



function bulksmsbalance() {

            
            admin_details();
            // Initialize variables ( set your variables here )

            $username = $GLOBALS['t_admins']['blkuser'];

            $password = $GLOBALS['t_admins']['blkpword'];

            // Set your domain's API URL

            $api_url  = 'https://portal.nigeriabulksms.com/api/';


            //Create the message data

            $data = array('username'=>$username, 'password'=>$password, 'action'=>'balance');

            //URL encode the message data

            $data = http_build_query($data);

            //Send the message

            $ch = curl_init(); // Initialize a cURL connection

            curl_setopt($ch,CURLOPT_URL, $api_url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

            $result = curl_exec($ch);

            $result = json_decode($result);


            if(isset($result->symbol))
            {
               
                $symbol = $result->symbol;

                $balance = $result->balance;
    
                echo $bal = $symbol.number_format(round($balance));

            }
            else if(isset($result->error))
            {
                
                echo '<small class="text-danger"    >Error. Pls refresh</small>';
            }
            else
            {
                // Could not determine the message response.

                echo '<small class="text-danger">Error. Pls refresh</small>';
            }

           

}


function afterpayment() {

    $date = date('Y-m-d');

    $nextdue = date('Y-m-d', strtotime($date. ' + 1 year'));

    admin_details();

    $user = $GLOBALS['t_admins']['blkuser'];
    
    $sql = "UPDATE `admin` SET `renew` = '$nextdue' WHERE `blkuser` = '$user'";
    $res = query($sql);

    redirect('./');
}


function getcategories() {

    $sql = "SELECT * FROM `category` ORDER BY `category` ASC";
    $res = query($sql);

    if(row_count($res) == '' || row_count($res) == null) {

        echo '<option>No category created<option>';

    } else {

        while($row = mysqli_fetch_array($res)) {

            echo '
            <option>'.$row['category'].'</option>

            ';
        }
    }
}


function getcategoriesbytype($cat) {

    $sql = "SELECT * FROM `users` WHERE `department` = '$cat' ORDER BY `Last Name` ASC";
    $res = query($sql);

    if(row_count($res) == '' || row_count($res) == null) {

        echo '<p class="text-danger">No registered users for this category</p>';

    } else {

            while($row = mysqli_fetch_array($res)) {

                echo '
                <tr>
                <td>'.$row['AttendanceID'].'</td>
                <td> <img src="upload/passport/'.$row['Passport'].'" alt="'.$row['Last Name'].' '.$row['First Name'].'" class="img-fluid img-responsive" width="50" />
                  '.$row['Last Name'].' '.$row['First Name'].'</td>
                <td>'.date('D, M d, Y', strtotime($row['dob'])).'</td>
                <td>'.$row['Gender'].'</td>
                <td><a href="tel:'.$row['Telephone1'].'">'.$row['Telephone1'].'</a><br/><br/><a href="tel: '.$row['Telephone2'].'">'.$row['Telephone2'].'</a></td>
                <td>'.$row['Address'].'</td>
                <td>
                    <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="./edit?ref='.$row['AttendanceID'].'"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="./delete?ref='.$row['AttendanceID'].'"
                        ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                        <a class="dropdown-item" href="./idcard?ref='.$row['AttendanceID'].'"
                        ><i class="bx bx-card me-1"></i> Download ID Card</a
                        >
                        </div>
                    </div>
                </td>
            </tr>

                ';
            }
    }
}


function getspecificuser($ref) {

    $sql  = "SELECT * FROM users WHERE `AttendanceID` = '$ref'";
    $res  = query($sql);

    if(row_count($res) == "" || row_count($res) == null) {

        redirect("./register");

        die();

    } else {


        $GLOBALS['specific_user'] = mysqli_fetch_array($res);

    }

}


function totalusers() {

    $sql = "SELECT COUNT(*) AS `allusers` FROM `users`";
    $res = query($sql);
    

    if(row_count($res) == '' || row_count($res) == null) {

        echo '0';

    } else {
    
    $row = mysqli_fetch_array($res);
    echo number_format($row['allusers']);

    }

}


function notifyuser($notifydata) {

    $_SESSION['notify'] = $notifydata;
}



function validatesecuritykey($keyy, $qrid) {


    $sql = "SELECT * FROM `keyy` WHERE `keyy` = '$keyy'";
    $res = query($sql);
 
    if(row_count($res) == '' || row_count($res) == null) {
 
        //<p class="text-danger">Invalid security key<p>';
 
        echo '
        <script>
        $(toastr.clear());
        $(toastr.error("Invalid security key"));
        </script>
        ';
 
    } else {
 
        
         //save details of user to attendance log
        saveattendancetolog($qrid);

    }
   


}


function statusdeterminer() {

    $time = date("h:i:sa");

    //status determiner
    admin_details();
    
    $expectedtimein = $GLOBALS['t_admins']['expectedtimein'];

    if($time > $expectedtimein) {

        return $status = "Late";

    } else {

       return $status = "Punctual";
    }
}


function checkattendancelog($qrid) {

    $date = date("Y-m-d");

    $sql  = "SELECT * FROM `log` WHERE `attendanceid` = '$qrid' AND `date` = '$date'";
    $res  = query($sql);

    if(row_count($res) == 1) {

        $GLOBALS['rerow'] = $res;

       return true;

    } else {

        return false;

    }
}


function checkattendancetype($qrid, $fullname, $statusdet) {

    if(checkattendancelog($qrid)) {

        $row = mysqli_fetch_array($GLOBALS['rerow']);

        if(($row['timein'] != '' || $row['timein']) != null && ($row['timeout'] != '00:00:00' || $row['timeout'] != '00:00:00')){

             //if yes, dont mark attendance

           echo '
           <script>
           $(toastr.clear());
           $(toastr.error("User already has an attendance"));
           </script>
           ';

           

        } else {


            if(($row['timein'] != '' || $row['timein']) != null && ($row['timeout'] == '00:00:00' || $row['timeout'] == '00:00:00')){

                $time = date("h:i:sa");

                //if yes, mark attnedance and update log

                $ssq = "UPDATE `log` SET `timeout` = '$time'";
                $res = query($ssq);


                sendsmsnotificationforattendace($qrid, $statusdet);


                echo '
                <script>
                $(toastr.clear());
                $(toastr.success("Attendance Successful"));
                $("#default").hide();
                $("#markedout").show();
                </script>
                
                ';


            } 


        }
    } else {

        $time = date("h:i:sa");
        $date = date("Y-m-d");


         //if not, mark attendance and insert log  
         $sql = "INSERT INTO `log`(`attendanceid`, `fullname`, `date`, `timeout`, `status`) VALUES ('$qrid', '$fullname', '$date', '$time', '$statusdet')";
         $res = query($sql);


         sendsmsnotificationforattendace($qrid, $statusdet);


        echo '
        <script>
        $(toastr.clear());
        $(toastr.success("Attendance Successful"));
        $("#default").hide();
        $("#markedout").show();
        </script>
        
        ';

    }
}


function saveattendancetolog($qrid) {

    $ref = $qrid;
    getspecificuser($ref);

    

    $fullname = $GLOBALS['specific_user']['Last Name']." ".$GLOBALS['specific_user']['First Name'];
    $date     = date("Y-m-d");
    $time     = date("h:i:sa");


    $statusdet = statusdeterminer();


    
    //saving log to database
    if(date("a") == 'am') {

        //check if user already has an attendance

        if(checkattendancelog($qrid)) {
  
                
                //if yes, dont mark attendance

                echo '
                <script>
                $(toastr.clear());
                $(toastr.success("User already has an attendance"));
                </script>
                ';


                } else {


                //if no, mark attendance

                //insert log

                $sql = "INSERT INTO `log`(`attendanceid`, `fullname`, `date`, `timein`, `status`) VALUES ('$qrid', '$fullname', '$date', '$time', '$statusdet')";
                $res = query($sql);


                sendsmsnotificationforattendace($qrid, $statusdet);


                echo '
                <script>
                $(toastr.clear());
                $(toastr.success("Attendance Successful"));
                $("#default").hide();
                $("#marked").show();
                </script>
                
                ';

        }

           

    } else {

        checkattendancetype($qrid, $fullname, $statusdet);       
        
    }


}



function validateqrid() {

    getlogo();

    $logo = $GLOBALS['logo'];


    $err  = <<<DELIMITER


     
            <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                
                    <!-- /Logo -->
                    <img src="assets/img/$logo" width="50" class="img-responsive img-fluid">
                    <h4 class="text-danger fw-bold mb-2 mt-3">Invalid ID Card</h4>
                    <p class="mb-4">The ID Card Scanned is invalid</p>

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


    DELIMITER;

    if(!isset($_GET['id'])) {


        echo $err;
        die();

    } else {



    $id = clean(escape($_GET['id']));


    $sql  = "SELECT * FROM users WHERE `qrid` = '$id'";
    $res  = query($sql);

    if(row_count($res) == "" || row_count($res) == null) {

       echo $err;

        die();

    } else {
     
        $GLOBALS['qr_user'] = mysqli_fetch_array($res);


        echo '
        
        <div class="container-xxl" id="default">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
             
              <!-- /Logo -->
              <img src="upload/passport/'.$GLOBALS['qr_user']['Passport'].'" width="100" class="img-responsive img-fluid">
              <h4 class="mb-2 mt-3 fw-bold">'.$GLOBALS['qr_user']['First Name'].' '.$GLOBALS['qr_user']['Last Name'].'</h4>
              <p class="mb-4">Kindly input security key to mark attendance</p>


                <form method="POST">
                
                <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Input Security Key</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="securitykeyy" name="securitykeyy"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" required
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>

                <input type="text" value="'.$GLOBALS['qr_user']['AttendanceID'].'" id="qrid" hidden>
              </div>
              
             <button type="button" name="securitykeysubmit" class="btn btn-primary d-grid w-100 mb-3" id="securitykeysubmit">Mark Attendance</button>

                
                </form>
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
        
        
        ';

    }
    }
}



function sendsmsnotificationforattendace($qrid, $statusdet) {

    $ref = $qrid;

    $time = date("h:ia");
    $type = date("a");


    getspecificuser($ref);
    admin_details();


     // Initialize variables ( set your variables here )

    $username = $GLOBALS['t_admins']['blkuser'];

    $password = $GLOBALS['t_admins']['blkpword'];

    $sender   = $GLOBALS['t_admins']['alias'];



    $role = $GLOBALS['specific_user']['department'];
    $fullname = $GLOBALS['specific_user']['Last Name'].' '.$GLOBALS['specific_user']['First Name'];

    if($role == 'Staff' && $type == 'am') {

        $msg    = $fullname." resumed ".$statusdet." - ".$time;
        $mobile = $GLOBALS['t_admins']['tel'];


    } else {

        if($role == 'Staff' && $type == 'pm') {

            $msg    = $fullname." closed at - ".$time;
            $mobile = $GLOBALS['t_admins']['tel'];
    
    
        } else {


            if($role != 'Staff' && $type == 'am') {

                $msg    = $fullname." resumed ".$statusdet." - ".$time;
                $mobile = $GLOBALS['specific_user']['Telephone1'].','.$GLOBALS['specific_user']['Telephone2'];
        
        
            } else {


                if($role != 'Staff' && $type == 'pm') {

                    $msg    = $fullname." left at - ".$time;
                    $mobile = $GLOBALS['specific_user']['Telephone1'].','.$GLOBALS['specific_user']['Telephone2'];
            
            
                } 
            }
        }

      
    }


    bulksmsapicall($username, $password, $msg, $mobile, $sender);
}



function bulksmsapicall($username, $password, $msg, $mobile, $sender) {

    
    $api_url  = 'https://portal.nigeriabulksms.com/api/';


    //Create the message data

    $data = array('username'=>$username, 'password'=>$password, 'message'=>$msg, 'sender'=>$sender, 'mobiles'=>$mobile);

    //URL encode the message data

    $data = http_build_query($data);

    //Send the message

    $ch = curl_init(); // Initialize a cURL connection

    curl_setopt($ch,CURLOPT_URL, $api_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($ch);

    $result = json_decode($result);


    //whatsapp notify

    whatsappnotifyattendance($mobile, $msg);
}



function whatsappnotifyattendance($mobile, $msg) {

                
            admin_details();

            // Initialize variables ( set your variables here )
            $token      = $GLOBALS['t_admins']['token'];
            $instanceid = $GLOBALS['t_admins']['instanceid'];


            //add country code to mobiles
            $numbers = explode(",", $mobile);
            $formatted_numbers = array_map(function($number) {
                return '+234'.ltrim($number, '0');
            }, $numbers);

            // convert array to string
            $numbers_string = implode(", ", $formatted_numbers);


        
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/$instanceid/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=$token&to=$mobile&body=$msg&priority=1&referenceId=",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);


}


function latecomerduration($attdid, $month) {

    $sql = "SELECT COUNT(*) AS `latecomeduration` FROM `log` WHERE `attendanceid` = '$attdid' AND `status` = 'Late' AND MONTH(`date`) = '$month'";
    $res = query($sql);

    $GLOBALS['latecomer'] = mysqli_fetch_array($res);


}


function latecomer() {

    $date = date("Y-m-d");
    $month = date("m");

    

    //get for the specific date
    $sql = "SELECT * FROM `log` WHERE `date` = '$date' AND `status` = 'Late'";
    $res = query($sql);

    if(row_count($res) == '' || row_count($res) == null) {

        echo "<p class='container text-danger'>No one came late today</p>";

    } else {



        while($row = mysqli_fetch_array($res)) {

                    $attdid = $row['attendanceid'];
                    $ref = $attdid;

                    //get latcoming duration
                    latecomerduration($attdid, $month);

                    getspecificuser($ref);

                    $department = $GLOBALS['specific_user']['department'];

            echo '
            
            <tr>
                        <td>'.$attdid.'</td>
                        <td>'.$row['fullname'].'</td>
                         <td>'.$department.'</td>
                        <td class="text-danger">'.date("h:ia", strtotime($row['timein'])).'</td>
                        <td>'.number_format($GLOBALS['latecomer']['latecomeduration']).'</td>
                       
                      </tr>
            
            
            ';
        }
    }



}


function totallatecomer() {

    $month = date("m");

    $sql = "SELECT COUNT(*) AS `latecomenumber` FROM `log` WHERE MONTH(`date`) = '$month' AND `status` = 'Late'";
    $res = query($sql);

    if(row_count($res) == '' || row_count($res) == null) {

        $latenumbers = 0;

        return $latenumbers;

    } else {

            $row = mysqli_fetch_array($res);
            $latenumbers = number_format($row['latecomenumber']);

            return $latenumbers;
    }
  
}


function getbirthdays() {

    $month = date("m");
    $day = date("d");

    
    //get list of all users
    $sql = "SELECT * FROM users WHERE MONTH(`dob`) = '$month' AND DAY(`dob`) = '$day'";
    $res = query($sql);

    if(row_count($res) == '' || row_count($res) == null) { 

        echo "<p class='container text-danger'>No birthday today</p>";

    } else {

        while($row = mysqli_fetch_array($res)) {

            $dob = $row['dob'];
            $dob_object = new DateTime($dob);
            $now = new DateTime();
            $age = $now->diff($dob_object);


        echo '
        
        <td>'.$row['AttendanceID'].'</td>
        <td>'.$row['Last Name'].' '.$row['First Name'].'</td>
        <td>'.$row['department'].'</td>
        <td>'.$age->y.' years old</td>
        ';

        }

    }
}


function birthdaynotify() { 

    $month = date("m");
    $day = date("d");

    
    //get list of all users
    $sql = "SELECT * FROM users WHERE MONTH(`dob`) = '$month' AND DAY(`dob`) = '$day' AND `bday` = ''";
    $res = query($sql);

    if(row_count($res) == '' || row_count($res) == null) { 

       //do nothing

    } else {

        while($row = mysqli_fetch_array($res)) {

            $ref = $row['AttendanceID'];
            
            getspecificuser($ref);
            admin_details();
        
        
             // Initialize variables ( set your variables here )
        
            $username = $GLOBALS['t_admins']['blkuser'];
        
            $password = $GLOBALS['t_admins']['blkpword'];

            $name   = $GLOBALS['specific_user']['First Name'];
        
            $sender   = $GLOBALS['t_admins']['alias'];

            $mobile = $GLOBALS['specific_user']['Telephone1'].','.$GLOBALS['specific_user']['Telephone2'];

            $msg = "Dear ".$name.", happy birthday and many more happy years to come";

            
            bulksmsapicall($username, $password, $msg, $mobile, $sender);


            //update db of bday
            $ssl = "UPDATE `users` SET `bday` = 'sent' WHERE MONTH(`dob`) = '$month' AND DAY(`dob`) = '$day'";
            $sel = query($ssl);


        }

    }

}


function checkvalidbirthday() {

    admin_details();

    $startyear =  $username = $GLOBALS['t_admins']['startyear'];
    $year      = date("Y");


    if($year === $startyear) {


        //send birthday message
        birthdaynotify(); 

    } else {

        //update all birthday in table
        $sql  = "SELECT * FROM users";
        $res  = query($sql);

        if(row_count($res) == "" || row_count($res) == null) {

            //do nothiny
            die();

        } else {

            while($row = mysqli_fetch_array($res)) {

                $atd = $row['AttendanceID'];

                $sell = "UPDATE users SET `bday` = '' WHERE `AttendanceID` = '$atd'";
                $rsll = query($sell);


                $dpt = "UPDATE `admin` SET `startyear` = '$year'";
                $des = query($dpt);

            }

        }
    }

}


function absentees() {

    //get all users
     $sql  = "SELECT * FROM users";
     $res  = query($sql);

     if(row_count($res) == "" || row_count($res) == null) {

         //do nothing
         die();

     } else {

         while($row = mysqli_fetch_array($res)) {

             $atd = $row['AttendanceID'];
             $date = date("Y-m-d");
             $month = date("m");
             $year = date("Y");


             //match their id with the log provided there is a time out
             $sel = "SELECT *  FROM `log` WHERE `attendanceid` = '$atd' AND `date` = '$date'";
             $log_res = query($sel);

            if(row_count($log_res) == 0) {


                //count the number of times the user appears in the log table for the current month
                $cql = "SELECT COUNT(*) as count FROM `log` WHERE `attendanceid` = '$atd' AND MONTH(date) = '$month' AND YEAR(date) = '$year'";
                $clog_res = query($cql);
                $count = mysqli_fetch_array($clog_res)['count'];
               


                $ref = $atd;

                getspecificuser($ref);
                
               echo '
               <tr>
               <td>'.$GLOBALS['specific_user']["AttendanceID"].'</td>
               <td>'.$GLOBALS['specific_user']["Last Name"].' '.$GLOBALS['specific_user']["First Name"].'</td>
               <td>'.$GLOBALS['specific_user']["department"].'</td>
               <td>'.number_format($count).'</td>
               </tr>
               ';

            }

        }

    }
   
}


function countabsentees() {

        //get all users
        $sql  = "SELECT * FROM users";
        $res  = query($sql);

        if(row_count($res) == "" || row_count($res) == null) {
            //do nothing
            die();
            
        } else {
            $count = 0;
            while($row = mysqli_fetch_array($res)) {
                $atd = $row['AttendanceID'];
                $date = date("Y-m-d");

                //match their id with the log provided there is a time out
                $sql = "SELECT * FROM `log` WHERE `attendanceid` = '$atd' AND `date` = '$date'";
                $log_res = query($sql);
                if(row_count($log_res) == 0) {
                    $count++;
                }
            }
        
            echo number_format($count);
        }

}


function absenteesbytype($department, $dater) {

    //get all users
     $sql  = "SELECT * FROM users WHERE `department` = '$department'";
     $res  = query($sql);

     if(row_count($res) == "" || row_count($res) == null) {

         //do nothing
         die();

     } else {

         while($row = mysqli_fetch_array($res)) {

             $atd = $row['AttendanceID'];
             $date = $dater;
             $month = date('m', strtotime($dater));
             $year = date('Y', strtotime($dater));


             //match their id with the log provided there is a time out
             $sel = "SELECT *  FROM `log` WHERE `attendanceid` = '$atd' AND `date` = '$date'";
             $log_res = query($sel);

            if(row_count($log_res) == 0) {


                //count the number of times the user appears in the log table for the current month
                $cql = "SELECT COUNT(*) as count FROM `log` WHERE `attendanceid` = '$atd' AND MONTH(date) = '$month' AND YEAR(date) = '$year'";
                $clog_res = query($cql);
                $count = mysqli_fetch_array($clog_res)['count'];
               


                $ref = $atd;

                getspecificuser($ref);
                
               echo '
               <tr>
               <td>'.$GLOBALS['specific_user']["AttendanceID"].'</td>
               <td>'.$GLOBALS['specific_user']["Last Name"].' '.$GLOBALS['specific_user']["First Name"].'</td>
               <td>'.$GLOBALS['specific_user']["department"].'</td>
               <td>'.number_format($count).'</td>
               </tr>
               ';

            }

        }

    }
   
}


function latecomerbytype($department, $dater) { 

    $date = date('Y-m-d', strtotime($dater));
    $month = date('m', strtotime($dater));

    

    //get for the specific date
    $sql = "SELECT * FROM `log` WHERE `date` = '$date' AND `status` = 'Late'";
    $res = query($sql);

    if(row_count($res) == '' || row_count($res) == null) {

        echo "<p class='container text-danger'>No one came late today</p>";

    } else {



        while($row = mysqli_fetch_array($res)) {

                    $attdid = $row['attendanceid'];
                    $ref = $attdid;

                    //get latcoming duration
                    latecomerduration($attdid, $month);

                    getspecificuser($ref);

                    $department = $GLOBALS['specific_user']['department'];

            echo '
            
            <tr>
                        <td>'.$attdid.'</td>
                        <td>'.$row['fullname'].'</td>
                         <td>'.$department.'</td>
                        <td class="text-danger">'.date("h:ia", strtotime($row['timein'])).'</td>
                        <td>'.number_format($GLOBALS['latecomer']['latecomeduration']).'</td>
                       
                      </tr>
            
            
            ';
        }
    }


}