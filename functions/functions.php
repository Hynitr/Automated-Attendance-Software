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
        Almost Complete...
        <script>
        window.location.href ="./"
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


    $fname = clean(escape($_POST['fname']));
    $lname = clean(escape($_POST['lname']));
    $attdid = clean(escape($_POST['attdid']));
    $gender = clean(escape($_POST['gender']));
    $tel1 = clean(escape($_POST['tel1']));
    $tel2 = clean(escape($_POST['tel2']));
    $dob = clean(escape($_POST['dob']));
    $category = clean(escape($_POST['category']));
    $address = clean(escape($_POST['address']));

    $date = date("Y-m-d");


    $sql = "INSERT INTO `users` (`First Name`, `Last Name`, `AttendanceID`, `Gender`, `Telephone1`, `Telephone2`, `dob`, `department`, `address`, `Datereg`) VALUES ('$fname', '$lname', '$attdid', '$gender', '$tel1', '$tel2', '$dob', '$category', '$address', '$date')";
    $res = query($sql);
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