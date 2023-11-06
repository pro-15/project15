<?php
// Simulate fetching user information (e.g., from a session or database).
session_start();
if (isset($_SESSION['settime'])) {
    if (isset($_SESSION['keep']) && $_SESSION['keep'] == true) $kep = true;
    else $kep = false;
    $tme = time() - $_SESSION['settime'];
    if (($kep == true && $tme > 1296000) || ($kep == false && $tme > 3600)) {
        session_unset();
        session_destroy();
    }
}
if (isset($_SESSION['uname'])) {
    $userInfo = [
        'username' => $_SESSION['uname'],
    ];
} else $userInfo = false;

// Return user information as JSON response.
header('Content-Type: application/json');
echo json_encode($userInfo);