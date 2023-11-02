<?php 


//your project path goes here
define("BASE_URL","http://localhost/project15/");
define("BASE_PATH","c:wamp64/www/project15/");

//set your timezone here
date_default_timezone_set('asia/kolkata');

session_start();
if(isset($_SESSION['settime'])) {
    if(isset($_SESSION['doc']) && $_SESSION['doc'] == true){
        if($_SESSION['settime']-time() > 43200) {
            echo "<script> alert('Session Expired!'); </script>";
            echo "location.replace('" . BASE_URL . "/doctor/logout.php'); </script>";
        }
    }
    else {
        if(isset($_SESSION['keep']) && $_SESSION['keep'] == true) $kep = true;
        else $kep = false;
        $tme = $_SESSION['settime'] - time();
        if(($kep == true && $tme > 43200) || ($kep == false && $tme > 1296000)) {
            echo "<script> alert('Session Expired!'); </script>";
            echo "location.replace('" . BASE_URL . "/pat/logout.php'); </script>";
        }
    }
}

 require(BASE_PATH.'config/database.php'); 
 require( BASE_PATH .'classes/database.php'); 
 require( BASE_PATH .'classes/FormAssist.class.php'); 
 require(BASE_PATH.'classes/FormValidator.class.php'); 
 require( BASE_PATH .'classes/DataAccess.class.php');
 


?>    