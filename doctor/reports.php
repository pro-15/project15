<?php

include('header.php');
require('dbcon.php');

$a = $_GET['uid'];
$info2 = $mysqli->query(
	"SELECT
	U.name AS user_name,
	U.dob AS dob,
	U.gender AS user_gender,
	U.email AS user_email,
	U.phone AS user_phone,
	B.id AS booking_id,
	B.appo_date,
	B.appo_time,
	B.status,
	D.name AS doctor_name,
	R.rid,
	R.did,
	R.pid,
	R.m_h,
	R.m_a,
	R.r_mp,
	R.v_s,
	R.lab_results,
	R.bid,
	R.summary,
	R.p_t
	FROM booking B
	JOIN user U ON B.user_id = U.id
	JOIN doctor D ON B.doctor_id = D.id
	JOIN record R ON B.id = R.bid 
	WHERE U.id=" . $a . " AND B.status='consulted' 
	ORDER BY R.rid DESC;"
);
?>

<?php
if ($info2->num_rows == 0) {
	echo "<script>alert('No records found');</script>";
	sleep(1);
	echo "<script>location.replace('record.php');</script>";
}
$info = array();
while ($row = $info2->fetch_assoc()) {
	$info[] = $row;
}
// $fields3=array('name','age','gender','email','phone');
// $info2=$dao->getDataJoin($fields3,'user','id='.$a);
// print_r($info);
$name = $info[0]['user_name'];
$dob = $info[0]['dob'];
$g = $info[0]['user_gender'];
$em = $info[0]['user_email'];
$phone = $info[0]['user_phone'];

// $fields4=array('id','appo_date','appo_time','status','doctor_id');
// $info=$dao->getDataJoin($fields4,'booking','user_id='.$a.' AND status="consulted"  ORDER BY id DESC');

?>
<style>
	/* Initial style for accordion items */
	.accordion-item {
		border: 1px solid #ddd;
		margin: 10px;
	}

	/* Style for accordion headers */
	.accordion-header {
		background-color: #f5f5f5;
		padding: 10px;
		cursor: pointer;
	}

	/* Style for accordion content */
	.accordion-content {
		display: none;
		padding: 10px;
	}
</style>
<div class="page-header">
	<h3 class="page-title">View Records</h3>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				Records
			</li>
			<li class="breadcrumb-item active">
				View Records
			</li>
		</ol>
	</nav>
</div>
<div class="row">
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-3">Patient Records</h4>
				<form method="POST">
					<div class="d-flex justify-content-between px-3 row-col-12">
						<a href="record.php" class="btn btn-primary"> Back </a>
						<button class="btn btn-outline-primary bg-white" onclick="return false;">Records Available</button>
						<button class="btn btn-outline-primary bg-white" onclick="return false;">Name: <?= $name ?></button>
						<button class="btn btn-outline-primary bg-white" onclick="return false;">DOB: <?= $dob ?></button>
						<button class="btn btn-outline-primary bg-white" onclick="return false;">Phone: <?= $phone ?></button>
						<button class="btn btn-outline-primary bg-white" onclick="return false;">Email: <?= $em ?></button>
					</div>
					<div class="row-col-12 mt-4">
						<div class="accordion">
							<?php
							foreach ($info as $key => $book) {
								$bid = $book['bid'];
								$dt = $book['appo_date'];
								$rid = $book['rid'];
								$dname = $book['doctor_name'];


								echo "
  <div class=\"accordion-item\">
  <div class=\"accordion-header\"><b>RID: $rid Report On $dt - Booking ID: $bid       Consulted - $dname</b></div>
  <div class=\"accordion-content\">
  <p>
  <b>Medical History:</b><br>$book[m_h]<br>
  <b>Medication and allergies:</b><br>$book[m_a]<br>
  <b>Recent Medical Treatment:</b><br>$book[r_mp]<br>
  <b>Vital Signs:</b><br>$book[v_s]<br>
  <b>Lab Results:</b><br>$book[lab_results]<br>
  <b>Summary:</b><br>$book[summary]<br>
  <b>Prescription and Treatment:</b><br>$book[p_t]<br>
  </p>  
  </div>
  </div>";
							}

							?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script>
	document.addEventListener("DOMContentLoaded", function() {
		const accordionItems = document.querySelectorAll(".accordion-item");

		accordionItems.forEach(function(item) {
			const header = item.querySelector(".accordion-header");
			const content = item.querySelector(".accordion-content");

			header.addEventListener("click", function() {
				if (content.style.display === "block") {
					content.style.display = "none";
				} else {
					content.style.display = "block";
				}
			});
		});
	});
</script>


<?php include("footer.php"); ?>