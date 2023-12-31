<?php
//your project path goes here
define("BASE_URL", "http://localhost/project15/");
define("BASE_PATH", "c:wamp64/www/project15/");

//set your timezone here
date_default_timezone_set('asia/kolkata');

session_start();

if (isset($_SESSION['doc_exp']) && time() > $_SESSION['doc_time'])
	header('location: '.BASE_URL.'doctor/logout.php');

if (isset($_SESSION['u_exp']) && time() > $_SESSION['u_exp'])
   header('location: '.BASE_URL.'user/logout.php');

require(BASE_PATH . 'config/database.php');
require(BASE_PATH . 'classes/database.php');
require(BASE_PATH . 'classes/FormAssist.class.php');
require(BASE_PATH . 'classes/FormValidator.class.php');
require(BASE_PATH . 'classes/DataAccess.class.php');