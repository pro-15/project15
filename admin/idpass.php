<?php
require('../config/autoload.php');

$elements = array(
  "username" => "",
  "password" => "",
  "id" => ""
);
$labels = array(
  "username" => "Username",
  "password" => "Password",
  "id" => "ID"
);
$rules = array(
  "username" => array(
    "required" => true,
    "unique" => array("field" => "username", "table" => "doctor")
  ),
  "password" => array("required" => true),
  "id" => array("required" => true)
);

$dao = new DataAccess();
$form = new FormAssist($elements, $_POST);
$validator = new FormValidator($rules, $labels);

if (isset($_POST['issue'])) {
  if ($validator->validate($_POST)) {
    $data = array(
      'username' => $_POST['username'],
      'password' => $_POST['password']
    );
    if ($dao->update($data, 'doctor', 'id=' . $_POST['id'])) {
      echo "<script> alert('Id pass added successfully');</script> ";
    }
  }
}
include('header.php');
?>
<h1 class="mb-3"><strong>Doctor</strong></h1>
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Issue Username & Password</h5>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="mb-3">
            <label class="form-label">Doctor</label>
            <?php
            $options = $dao->createOptions('name', 'id', "doctor");
            echo $form->dropDownList('id', array('class' => 'form-select'), $options); ?>
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name='password' class="form-control" placeholder="Password" aria-label="Username">
          </div>
          <button type="submit" name='issue' value='sub' class="btn btn-primary"> Issue </button><br>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>