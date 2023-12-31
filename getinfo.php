<?php
session_start();
if (isset($_SESSION['u_exp']) && time() > $_SESSION['u_exp']) {
    session_unset();
    session_destroy();
}

$info = array();
if (isset($_SESSION['uname'])) {
    $info['username'] = $_SESSION['uname'];
} else $info['username'] = false;


$DB_HOST = "localhost";
$DB_NAME = "project15";
$DB_USER = "root";
$DB_PASSWORD = "";
$_con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

function getc($_con, $field, $table, $condition = "1") {
    return mysqli_fetch_assoc(mysqli_query($_con, "SELECT count($field) as c FROM $table WHERE $condition;"))['c'];
}
$info['doc'] = getc($_con, 'id', 'doctor');
$info['dep'] = getc($_con, 'id', 'department');
$info['pat'] = getc($_con, 'id', 'user');
$info['vis'] = getc($_con, 'id', 'booking', "status='consulted'");


// Return user information as JSON response.
header('Content-Type: application/json');
echo json_encode($info);
