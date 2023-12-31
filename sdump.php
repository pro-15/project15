<?php
session_start();
echo "<title>SESSION DUMP</title>";
echo var_dump($_SESSION);
echo time();