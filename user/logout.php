<?php
session_start();
session_unset();
session_destroy();
header('Location: /project15/user/login.php');