<?php
require('../config/autoload.php');
include("header.php");
$dao = new DataAccess();
$info = $dao->getData('*', 'booking', 'id=' . $_GET['id']);
$elements = array(
  "appo_date" => $info[0]['appo_date'],
  "appo_time" => $info[0]['appo_time'],
  "doctor_id" => $info[0]['doctor_id']
);
$labels = array(
  'appo_date' => "Appointment date",
  "appo_time" => "Appointment time",
  "doctor_id" => "Doctor ID"
);
$rules = array(
  "appo_time" => array("required" => false),
  "appo_date" => array("required" => false),
  "doctor_id" => array("required" => false),
);
$file = new FileUpload();
$form = new FormAssist($elements, $_POST);
$validator = new FormValidator($rules, $labels);

if (isset($_POST["btn_update"])) {
  if ($validator->validate($_POST)) {
    $data = array(
      'appo_date' => $_POST['appo_date'],
      'appo_time' => $_POST['appo_time'],
      'doctor_id' => $_POST['doctor_id']
    );
    $condition = 'id=' . $_GET['id'];
    if ($dao->update($data, 'booking', $condition)) {
      $msg = "Successfullly Updated";
    } else {
      $msg = "Failed";
    }
    echo "<span style='color:green;'>$msg</span>";
  }
}
?>
<h1 class="mb-3"><strong>Departments</strong></h1>
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Edit Department</h5>
      </div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Appo time</label>
            <input class="form-control" type='time' name="appo_time" value=<?= $elements['appo_time'] ?>>
          </div>
          <div class="mb-3">
            <label class="form-label">date</label>
            <input class="form-control" type='date' name="appo_date" value=<?= $elements['appo_date'] ?>>
          </div>
          <div class="mb-3">
            <label class="form-label">Doctor</label>
            <?php
            $options = $dao->createOptions('name', 'id', "doctor");
            echo $form->dropDownList('doctor_id', array('class' => 'form-select'), $options); ?>
            <?= $validator->error('doctor_id'); ?>
          </div>
          <button type="submit" class="btn btn-warning" name="btn_update">UPDATE</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>