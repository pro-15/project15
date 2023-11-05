<?php
require('../config/autoload.php');
$dao = new DataAccess();
include('header.php');
?>
<h1 class="mb-3"><strong>Patients</strong></h1>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">Patients List</h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Gender</th>
							<th>DOB</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Password</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$actions = array(
							'edit' => array(
								'label' => 'Edit',
								'link' => 'edituser.php',
								'params' => array('id' => 'id'),
								'attributes' => array('class' => 'btn btn-success')
							),
							'delete' => array(
								'label' => 'Send Password',
								'link' => 'sendpass.php',
								'params' => array('id' => 'id'),
								'attributes' => array('class' => 'btn btn-success')
							)
						);
						$config = array();
						$join = array();
						$fields = array('id', 'name', 'gender', 'dob', 'email', 'phone', 'password');
						$users = $dao->selectAsTable($fields, 'user', 1, 1, $actions, 1);
						echo $users;
						//  $d=$dao->getData(array('b.*,d.*,u.*'),"booking b JOIN doctor d ON b.doctor_id = d.id JOIN user u ON b.user_id = u.id");  
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php require('footer.php'); ?>