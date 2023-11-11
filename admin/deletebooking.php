<?php
require('../config/autoload.php');
$dao = new DataAccess();
$m = $dao->delete('booking', 'id='.$_GET['id']);
header("location: /project15/admin/booking.php");