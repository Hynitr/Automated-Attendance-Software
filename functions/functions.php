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

    } else {

        $data = $_SESSION['login'];

        //users details
        $sql = "SELECT * FROM `admin`";
        $rsl = query($sql);

        $GLOBALS['t_admins'] = mysqli_fetch_array($rsl);

    }
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
        echo "Sorry, only JPG and JPEG files are allowed.";
        $uploadOk = 0;
    } else {
    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, the passport was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            echo '
            <script>
            $(toastr.clear());
            $(toastr.info("Uploading passport..."));
            </script>
            ';
            move_uploaded_file($_FILES["passport"]["tmp_name"], $targetFilePath);

        }
    }






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


    echo '
    <script>
    $(toastr.clear());
    $(toastr.info("Generating ID Card..."));
    </script>
    ';

    
    //generate unqiue ID
    QRcode::png($GLOBALS['t_admins']['website'].'/qrnt?id='.$d.'', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    


     // benchmark
     QRtools::timeBenchmark();  
        

    $sql = "INSERT INTO `users` (`First Name`, `Last Name`, `AttendanceID`, `Gender`, `Telephone1`, `Telephone2`, `dob`, `department`, `address`, `Datereg`, `Passport`, `qrcode`, `qrid`) VALUES ('$fname', '$lname', '$attdid', '$gender', '$tel1', '$tel2', '$dob', '$category', '$address', '$date', '$target_file', '$dname', '$d')";
    $res = query($sql);

    echo '
    <script>
    $(toastr.clear());
    $(toastr.success("Upload Completed..."));

    window.location.assign("./registersuccess?ref='.$d.'");
    </script>
    ';


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

    while($row = mysqli_fetch_array($res)) {

        echo '
        
        <option>'.$row['category'].'</option>

        ';
    }

}