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
         $_SESSION['doc_exp'] = time() + 43200;
         header('location: index.php');
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
   <link rel="stylesheet" href="assets/css/style.css" />
   <link rel="stylesheet" href="assets/css/modalrecord.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>

   <!-- End layout styles -->
   <link rel="shortcut icon" href="assets/images/favicon.png" />
   <style>
      body {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         /* Ensure the container takes the full height of the viewport */
         margin: 0;
         /* Remove default margin */
         background: url('assets/images/bg-01.jpg');
         background-size: cover;
      }

      .round-end {
         border-radius: 10px !important;
      }
   </style>
</head>

<body>
   <div class="col-4 stretch-card grid-margin">
      <div class="card round-end">
         <div class="card-body p-5">
            <div class="text-center mb-5">
               <h3 class="text-muted font-weight-bold">Doctor Login</h3>
            </div>
            <form method="POST">
               <div class="form-group">
                  <label class="font-weight-bold">Username</label>
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" />
               </div>
               <div class="form-group">
                  <label class="font-weight-bold">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />
               </div>
               <button type="submit" name="login" class="btn btn-lg btn-blocks btn-dark form-control formcontrol-lg me-2"> Submit </button>
            </form>
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