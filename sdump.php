<?php
session_start();
echo "<title>SESSION DUMP</title>";
echo var_dump($_SESSION);
if (isset($_SESSION['settime'])) {
    if (isset($_SESSION['doc']) && $_SESSION['doc'] == true) {
        $tm_out = 43200;
    } else {
        if (isset($_SESSION['keep']) && $_SESSION['keep'] == true) $tm_out = 1296000;
        else $tm_out = 3600;
    }
    $tm_elap = time() - $_SESSION['settime'];
    $tm_left = $tm_out - $tm_elap;
    echo "<br>Timeout = ". $tm_out;
    echo "<br>Time elapsed = ". $tm_elap;
    echo "<br>Time left = ". $tm_left;
}
