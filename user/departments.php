<?php require('../config/autoload.php'); ?>

<?php
$dao = new DataAccess();
class UndefinedArrayKeyException extends Exception
{
	public function __construct($key)
	{
		parent::__construct("Undefined array key: $key");
	}
}
class ArrayOffsetException extends Exception
{
	public function __construct($key)
	{
		parent::__construct("Undefined array key: $key");
	}
}
if (isset($_SESSION['user_id'])) {
	$a = $_SESSION['user_id'];
	$fields2 = array('id', 'status');
	try {
		$bookstat = $dao->getDataJoin($fields2, 'booking', 'user_id=' . $a . ' LIMIT 1');



		if (!empty($bookstat)) {
			if ($bookstat[0]['status'] == 'paymentpending') {

				header('Location: /project15/payment/pendingpayment.php');
			}
		}
	} catch (UndefinedArrayKeyException $e) {
		$k = 'fg';
		echo $e->getMessage();
	} catch (Exception $e) {
		echo "An unexpected exception occurred: " . $e->getMessage();
	} catch (ArrayOffsetException $e) {
		echo "An unexpected exception occurred: " . $e->getMessage();
	}
}






?>
<?php include('header.php'); ?>


<section id="departments" class="services">
	<div class="container">

		<div class="section-title mt-5">
			<p>
			<h2>Departments</h2>
			</p>
		</div>

		<div class="row">


			<?php
			$config = array(
				'srno' => true,
				'hiddenfields' => array('id'),
				'images' => array(
					array(
						'field' => "image",
						'path' => "../images/",
						"attributes" => array("height" => '100')
					)
				),

			);


			$join = array();
			$fields = array('id', 'name', 'image');

			$users = $dao->getDataJoin($fields, 'department', 1);
			foreach ($users as $key => $row) {
				$dept = $row['id'];
				$name = $row['name'];
				$im = $row['image'];
				echo "
					<div class='col-lg-4 col-md-6 d-flex align-items-stretch my-2'>
					<a href='doctors.php?id=$dept'>
        				<div class='icon-box'>
          				<div>
								<img  class='fas' src='/project15/images/$im' width='150px'>
							</div>
          				<h4>$name</h4>
          				<p>
								Click here to view all the doctors in the department.
								
							</p>
        				</div>
						</a>
      			</div>";
			}
			?>

		</div>

	</div>
</section>
<?php include('footer.php'); ?>