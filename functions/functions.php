<?php

/*************helper functions***************/

function clean($string) {

    return htmlentities($string);
}

function redirect($location) {

    return header("Location: {$location}");
}


//get most read book
function most_read_book() {

    $sql = "SELECT *, COUNT(`bbid`) AS `value_occurrence` FROM `boughtbook` WHERE `reading` = 'Yes' GROUP BY `bbid` ORDER BY `value_occurrence` DESC LIMIT 1";
    $res = query($sql);

    $GLOBALS['mostbook'] = mysqli_fetch_array($res);

    //get book details
    $id = $GLOBALS['mostbook']['bookid'];

    $sel = "SELECT * FROM `books` WHERE `books_id` = '$id'";
    $rel = query($sel);

    $GLOBALS['mostbookdetails'] = mysqli_fetch_array($rel);


    //book description
    $det = strip_tags($GLOBALS['mostbookdetails']['description']);
    $frv = wordwrap($det, 200, "\n", TRUE); 
    $y = substr($frv, 0, 320).'... <a href="https://dashboard.booksinvogue.com/bookdetails?id='.$GLOBALS['mostbookdetails']['books_id'].'">Read More</a>';

    $GLOBALS['descrp'] = ucfirst($y);


    //get total boook bought
    $sle = "SELECT sum(`id`) AS `bookbought` FROM `boughtbook` WHERE `bookid` = '$id' AND `reading` = 'Yes'";
    $rss = query ($sle);

    if(row_count($rss) == '' || row_count($rss) == null) {

        $GLOBALS['booktot'] = 0 ." copy sold";
        
    } else {

        $bow = mysqli_fetch_array($rss);

        if($bow['bookbought'] == 0 || $bow['bookbought'] == null) {

            $GLOBALS['booktot'] = 0 ." copy sold";

        } else {

            if($bow['bookbought'] == 1) {

                $GLOBALS['booktot'] = 1 ." copy sold";
                
            } else {
                $GLOBALS['booktot'] = number_format($bow['bookbought'])." copies sold";

            }
        }
        
    }
}


//get book details
function book_details($data) {

    $sql = "SELECT * FROM books WHERE `books_id` = '$data' OR `book_title` = '$data'";
    $res = query($sql);
    if(row_count($res) == null || row_count($res) == '') {

        redirect('./books');
        
    } else {

        $GLOBALS['bookss'] = mysqli_fetch_array($res);

    }
}


//get author details
function author($data) {

    $sql = "SELECT * FROM users WHERE `fullname` LIKE '%$data%'";
    $res = query($sql);
    if(row_count($res) == null || row_count($res) == '') {

        redirect('./books');
        
    } else {

        $GLOBALS['author'] = mysqli_fetch_array($res);
    }
}


// DASHBOARD FUNCTIONS FOR USER
function user_details() {

    if(!isset($_SESSION['login'])) {


    } else {

        $data = $_SESSION['login'];

        //users details
        $sql = "SELECT * FROM users WHERE `usname` = '$data' OR `email` = '$data'";
        $rsl = query($sql);

        $GLOBALS['t_users'] = mysqli_fetch_array($rsl);

    }
}


function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}



if(isset($_POST['bookid'])) {

    $bookid = clean(escape($_POST['bookid']));

    if(isset($_SESSION['login'])) {

        user_details();

        $role = $GLOBALS['t_users']['role'];
        
        if($role == 'AUTHOR' || $role == 'author') {

            echo '<script>window.location.href ="https://dashboard.booksinvogue.com/author/bookdetails?book='.$bookid.'"</script>';

        } else {

        if($role == 'USER' || $role == 'user') {

            echo '<script>window.location.href ="https://dashboard.booksinvogue.com/bookdetails?book='.$bookid.'"</script>';

            
        } else {

        if($role == 'PUBLISHER' || $role == 'publisher') {

            echo '<script>window.location.href ="https://dashboard.booksinvogue.com/publisher/bookdetails?book='.$bookid.'"</script>';


        } else {

        if($role == 'Admin' || $role == 'ADMIN') {

            echo '<script>window.location.href ="https://admin.booksinvogue.com/bookdetails?book='.$bookid.'"</script>';

        }
        }
        }
        }
 

    } else {

        //get ip address
        $ip = get_client_ip();

        //check if record 
        $ssl = "SELECT * FROM guest WHERE `ip` = '$ip'";
        $res = query($ssl);

        if(row_count($res) == 1) {

            $ssl = "UPDATE guest SET `det` = '$bookid' WHERE `ip` = '$ip'";
            $rsl = query($ssl);

        } else {

        //insert into sql
        $sql = "INSERT INTO guest(`det`, `ip`)";
        $sql.= "VALUES('$bookid', '$ip')";
        $res = query($sql);
        
        }

         //redirect to signup        
         echo "<script>window.location.href='https://dashboard.booksinvogue.com/signin'</script>";
    }
}