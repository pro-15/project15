
<?php require('../config/autoload.php'); 



if(session_destroy()){

    header('Location: '.BASE_URL.'/doctor/login/login.php');
}
 

?>