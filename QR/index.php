<?php   
require ("../functions/init.php");
if (!isset($_SESSION['code'])) {

    redirect("../enroll");

}

    $sql ="SELECT * FROM students WHERE `AdminID` = '".$_SESSION["code"]."'";
    $result = query($sql);
    
    if(row_count($result) >= 1) {
    $row = mysqli_fetch_array($result);
    
    $data = $row['AdminID'];
    $d = md5($data);
    $_POST['id'] = $data;
    $pass = str_replace('/', '', $data);
    
    $fname = "$pass.png";

/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = '../upload/QRCard/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_WEB_DIR.$fname;
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'H'; 

    $matrixPointSize = 4;


    if (!isset($_SESSION['code'])) { 
    
            die('server error!');
        
    } else {    
    
        //default data
        QRcode::png($call['stud'].'/qrnt?id='.$d.'', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    
    }  
    
     $sqll = "UPDATE students SET `qrcode` = '$fname' WHERE `AdminID` = '".$_SESSION["code"]."'";
     $re   = query($sqll);

header("location: .././atcard-print");
?>