<?php
require('../config/autoload.php');
$dao = new DataAccess();
include('header.php');
?>
<h1 class="h3 mb-3"><strong>Doctors</strong></h1>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">Doctors List</h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover table-sm" style="overflow: auto;">
					<thead>
						<tr>
							<th>#</th>
							<th>Doctor Name</th>
							<th>Gender</th>
							<th>Department</th>
							<th>Qualification</th>
							<th>Address</th>
							<th>Image</th>
							<th>Phone</th>
							<th>DOB</th>
							<th class="d-none d-xl-table-cell">Edit</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$actions = array(
							'edit' => array(
								'label' => '<i class="align-middle" data-feather="edit"></i>',
								'link' => 'editdoctorimage.php',
								'params' => array('id' => 'id'),
								'attributes' => array(
									'class' => 'btn btn-warning'
								)
							),
							'delete' => array(
								'label' => '<i class="align-middle" data-feather="trash-2"></i>',
								'link' => 'deletedoctor.php',
								'params' => array('id' => 'id'),
								'attributes' => array(
									'class' => 'btn btn-danger'
								)
							)
						);
						$config = array(
							'srno' => true,
							'hiddenfields' => array('id'),
							'images' => array(
								array(
									'field' => "image",
									'path' => "../doctorimage/",
									"attributes" => array("class" => "rounded-circle","height" => '100')
								)
							),
						);
						$join = array();
						$fields = array('id', 'name', 'gender', 'department', 'qualification', 'address', 'image', 'phone', 'dob');
						$users = $dao->selectAsTable($fields, 'doctor', 1, $join, $actions, $config);
						echo $users;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php require('footer.php'); ?>