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