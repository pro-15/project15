<?php

include('header.php');
$dateFormatted = date("Y-m-d");
$dateFormatted = trim($dateFormatted);

$bookedtimes = array('id', 'user_id', 'appo_date', 'appo_time', 'status', 'slot');
$did = $_SESSION['doctor_id'];
$slot = "m";
$bookedslots = $dao->getDataJoin($bookedtimes, 'booking', 'doctor_id=' . $did . ' and status="confirm" and slot="m" AND appo_date="' . $dateFormatted . '" ORDER BY appo_time');

if (!empty($bookedslots)) {
	$msg = 'Bookings';
} else {
	$msg = "No Bookings";
}

?>
<div class="page-header">
	<h3 class="page-title">Bookings Today</h3>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				Bookings
			</li>
			<li class="breadcrumb-item active">
				Bookings Today
			</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Morning </h4>
				<?php
				if (empty($bookedslots)) {
					echo "<p class='card-description'> $msg </p>";
				}
				foreach ($bookedslots as $booking) {
					$bid = $booking['id'];
					$status = $booking['status'];
					$timeslot = $booking['appo_time'];
					$fields3 = array('name', 'dob');
					$info2 = $dao->getDataJoin($fields3, 'user', 'id=' . $booking['user_id']);
					$name = $info2[0]['name'];
					echo "<div class=\"row mx-3 p-3 border rounded\">
								<div class=\"col-6 my-auto\">
										<h5 class=\"text-muted\">Booking Id: $bid</h5>
    									<h4>$name</h4>
								</div>
								<div class=\"col-2 my-auto text-center\">
    								Time slot: $timeslot
								</div>
								<div class=\"col-2 my-auto text-center\">
									<label class='badge badge-";
					if ($status == 'confirm') echo 'success';
					else echo "danger";
					echo "'>$status</label>
								</div>
								<div class=\"col-2 my-auto text-center\">
    								<a href=\"consult.php?bid=$bid\" class=\"btn btn-primary\">
										<i class=' align-middle mdi mdi-clipboard-account'></i>Consult
									</a>
								</div>
    						</div>";
				}


				$bookedtimes = array('id', 'user_id', 'appo_date', 'appo_time', 'status', 'slot');
				$did = $_SESSION['doctor_id'];
				$slot = "m";
				$bookedslots = $dao->getDataJoin($bookedtimes, 'booking', 'doctor_id=' . $did . ' and status="confirm" and slot="e" AND appo_date="' . $dateFormatted . '" ORDER BY appo_time');

				if (!empty($bookedslots)) {
					$msg = 'Bookings';
				} else {
					$msg = "No Bookings";
				}

				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Evening</h4>
				<?php
				if (empty($bookedslots)) {
					echo "<p class='card-description'> $msg </p>";
				}
				foreach ($bookedslots as $booking) {
					$bid = $booking['id'];
					$status = $booking['status'];
					$timeslot = $booking['appo_time'];
					$fields3 = array('name', 'dob');
					$info2 = $dao->getDataJoin($fields3, 'user', 'id=' . $booking['user_id']);
					$name = $info2[0]['name'];
					echo "<div class=\"row mx-3 p-3 border rounded\">
								<div class=\"col-6 my-auto\">
										<h5 class=\"text-muted\">Booking Id: $bid</h5>
    									<h4>$name</h4>
								</div>
								<div class=\"col-2 my-auto text-center\">
    								Time slot: $timeslot
								</div>
								<div class=\"col-2 my-auto text-center\">
									<label class='badge badge-";
					if ($status == 'confirm') echo 'success';
					else echo "danger";
					echo "'>$status</label>
								</div>
								<div class=\"col-2 my-auto text-center\">
    								<a href=\"consult.php?bid=$bid\" class=\"btn btn-primary\">
										<i class=' align-middle mdi mdi-clipboard-account'></i>Consult
									</a>
								</div>
    						</div>";
				}
				?>
			</div>
		</div>
	</div>
</div>


<?php include("footer.php"); ?>