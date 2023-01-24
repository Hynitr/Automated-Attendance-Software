<?php
include('functions/init.php');


//destroy session
session_destroy();

//redirect to login page
redirect("./signin");
?>