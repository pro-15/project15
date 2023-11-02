<?php
// Simulate fetching user information (e.g., from a session or database).
session_start();
if(isset($_SESSION['uname'])) {
    $userInfo = [
        'username' => $_SESSION['uname'],
    ];
}
else $userInfo = false;

// Return user information as JSON response.
header('Content-Type: application/json');
echo json_encode($userInfo);
?>