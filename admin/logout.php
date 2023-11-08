<?php
session_start();
session_unset();
session_destroy();
header("location: /project15/admin/login.php");