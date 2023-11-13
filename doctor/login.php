<?php
require('../config/autoload.php');
$dao = new DataAccess();

$elements = array("username" => "", "password" => "");
$form = new FormAssist($elements, $_POST);
$rules = array(
   'username' => array('required' => true),
   'password' => array('required' => true),
);
$validator = new FormValidator($rules);

if (isset($_POST['login'])) {
   if ($validator->validate($_POST)) {
      $data = array('username' => $_POST['username'], 'password' => $_POST['password']);
      if ($info = $dao->login($data, 'doctor')) {
         $_SESSION['doctor_id'] = $info['id'];
         header('location:../dashboards/bookings.php');
      } else {
         $msg = "invalid username or password";
         echo "<script> alert('Invalid username or password');</script> ";
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <title>Doctor</title>
   <!-- plugins:css -->
   <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
   <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
   <!-- endinject -->
   <!-- Plugin css for this page -->
   <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
   <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <!-- endinject -->
   <!-- Layout styles -->
   <link rel="stylesheet" href="assets/css/demo_1/style.css" />
   <link rel="stylesheet" href="assets/css/modalrecord.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>

   <!-- End layout styles -->
   <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body class="bg-dribble">


   <div class="main-panel">
      <div class="row">
         <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <form method="POST">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" />
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" />
                     </div>
                     <div class="row">
                        <button type="submit" class="btn btn-primary me-2"> Submit </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>


   <script src="assets/vendors/js/vendor.bundle.base.js"></script>
   <!-- endinject -->
   <!-- Plugin js for this page -->
   <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
   <script src="assets/vendors/chart.js/Chart.min.js"></script>
   <script src="assets/vendors/flot/jquery.flot.js"></script>
   <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
   <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
   <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
   <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
   <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
   <!-- End plugin js for this page -->
   <!-- inject:js -->
   <script src="assets/js/off-canvas.js"></script>
   <script src="assets/js/hoverable-collapse.js"></script>
   <script src="assets/js/misc.js"></script>
   <script src="assets/js/settings.js"></script>
   <script src="assets/js/todolist.js"></script>
   <!-- endinject -->
   <!-- Custom js for this page -->
   <script src="assets/js/dashboard.js"></script>
   <!-- End custom js for this page -->
</body>

</html>