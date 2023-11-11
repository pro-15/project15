<?php
require('../config/autoload.php');
$dao = new DataAccess();
$m = $dao->delete('department', 'id='.$_GET['id']);
header("location: /project15/admin/department.php");