<?php

include('header.php');
$dao = new DataAccess();
$elements = array(
	"date" => "",
	"m_start" => "",
	"m_end" => "",
	"e_start" => "",
	"e_end" => ""
);

$form = new FormAssist($elements, $_POST);
$labels = array(
	"date" => "Date of booking",
	"m_start" => "Morning start",
	"m_end" => "Morning end",
	"e_start" => "Evening start",
	"e_end" => "Evening end"
);

$rules = array(
	"date" => array("required" => true),
	"m_start" => array("required" => true),
	"m_end" => array("required" => true),
	"e_start" => array("required" => true),
	"e_end" => array("required" => true),
);

$validator = new FormValidator($rules, $labels);

if (isset($_POST['submit'])) {
	if ($validator->validate($_POST)) {

		// Create a DateTime object using the original time string
		$date1 = new DateTime($_POST['m_start']);
		$date2 = new DateTime($_POST['m_end']);
		$date3 = new DateTime($_POST['e_start']);
		$date4 = new DateTime($_POST['e_end']);

		// Convert it into the 12-hour format using the `format` method
		$formatted_time1 = $date1->format('g:i A');
		$formatted_time2 = $date2->format('g:i A');
		$formatted_time3 = $date3->format('g:i A');
		$formatted_time4 = $date4->format('g:i A');


		// code for insertion 

		$data = array(
			'date' => $_POST['date'],
			'm_start' => $formatted_time1,
			'm_end' => $formatted_time2,
			'e_start' => $formatted_time3,
			'e_end' => $formatted_time4,
			'doctor_id' => $_SESSION['doctor_id']

		);
		if ($dao->insert($data, 'schedule')) {
			"<script> alert('Scheduled successfully');</script> ";
		} else
			$msg = "insertion failed";
		echo "<p style=color:green;>Schedule added successfully</p>";
	}
}

if (isset($_POST['home'])) {
	echo "<script> alert('New zxx created successfully');</script> ";
	echo "<script> location.replace('displaycategory.php'); </script>";
}

?>

<div class="page-header">
	<h3 class="page-title">Add Schecule</h3>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				Schedule
			</li>
			<li class="breadcrumb-item active">
				Add Schedule
			</li>
		</ol>
	</nav>
</div>

<div class="row">
	<div class="col-6 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-3">Morning </h4>
				<form method="POST">
					<div class="form-group">
						<label>Date</label>
						<input type="date" name='date' class="form-control form-control-lg" placeholder="Date" aria-label="Username">
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label>Morning Start</label>
							<input type="time" name='m_start' class="form-control" placeholder="Username" aria-label="Username">
						</div>
						<div class="form-group col-6">
							<label>Morning End</label>
							<input type="time" name='m_end' class="form-control" placeholder="Username" aria-label="Username">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<label>Evening Start</label>
							<input type="time" name='e_start' class="form-control" placeholder="Username" aria-label="Username">
						</div>
						<div class="form-group col-6">
							<label>Evening End</label>
							<input type="time" name='e_end' class="form-control" placeholder="Username" aria-label="Username">
						</div>
					</div>

					<button type="submit" name='submit' value='sub' class="btn btn-primary mb-2"> Submit </button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php include("footer.php"); ?>