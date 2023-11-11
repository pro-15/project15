<?php
require('../config/autoload.php');
$dao = new DataAccess();
$m = $dao->delete('doctor', 'id='.$_GET['id']);
header("location: /project15/admin/doctor.php");