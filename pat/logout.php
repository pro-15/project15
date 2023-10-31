
<?php require('../config/autoload.php'); 



if(session_destroy()){

    header('Location: /project15/user/login.php');
}
 

?>