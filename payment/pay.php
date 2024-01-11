<?php
require('../config/autoload.php');
if (!isset($_SESSION['user_id'])) {
	header('Location: /project15/user/login.php');
}
$a = $_SESSION['user_id'];
$dao = new DataAccess();

$fields2 = array('id', 'status', 'id', 'doctor_id');
$bookstat = $dao->getDataJoin($fields2, 'booking', 'user_id=' . $a . ' ORDER BY id DESC LIMIT 1');

$fields = array('fee');
$info = $dao->getDataJoin($fields, 'doctor', 'id=' . $bookstat[0]['doctor_id'] . ' LIMIT 1');
$amt = $info[0]['fee'];


if ($bookstat[0]['id'] != $_SESSION['booking_id']) {
	header('Location: /project15/403.html');
} else {
	if (isset($_POST['next'])) {
		$data = array(
			'status' => 'confirm'
		);
		$paydata = array(
			'booking_id' => $_SESSION['booking_id'],
			'amount' => $amt
		);
		if ($dao->update($data, 'booking', 'id=' . $bookstat[0]['id']) && $dao->insert($paydata, 'payment')) {
			echo "<script>location.replace('/project15/payment/confirmation.php');</script>";
		}
	}
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">
		function validations() {
			var x = document.getElementById("Cname");
			if (x.value == "") {
				alert("Enter Cardholder's Name");
				x.focus();
				return false;
			}
			var x = document.getElementById('cardnumber');
			if (x.value == '') {
				alert('Enter card number');
				x.focus();
				return false;
			}
			var y = /^[0-9]+$/;
			if (!y.test(x.value)) {
				alert('Enter valid card number');
				x.focus();
				return false;
			}
			var x = document.getElementById("date");
			if (x.value == "") {
				alert("Enter Card Month");
				x.focus();
				return false;
			}
			if (!/^\d{2}$/.test(x.value)) {
				alert('Enter a valid two-digit month');
				x.focus();
				return false;
			}
			var y = document.getElementById("Cyy");
			if (y.value == "") {
				alert("Enter Card Year");
				y.focus();
				return false;
			}
			var dte = parseInt(y.value) * 100 + parseInt(x.value);
			var cur_date = <?= ((int)date('Y')) * 100 + ((int)date('m')) ?>;
			if(dte < cur_date) {
				alert("Card Expired");
				x.focus();
				return false;
			}
			var x = document.getElementById("verification");
			if (x.value == "") {
				alert("Enter Card CVV / CVC");
				x.focus();
				return false;
			}
		}
	</script>

	<meta charset="UTF-8">
	<title>Payment</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="payment/style.css">
	<meta name="robots" content="noindex,follow">
</head>

<body>
	<form action="" method="POST" onSubmit="return validations()" enctype="multipart/form-data">
		<div class="checkout-panel">
			<div class="panel-body">
				<h2 class="title">Checkout</h2>

				<div class="progress-bar">
					<div class="step active"></div>
					<div class="step"></div>
					<div class="step"></div>
				</div>

				<div class="payment-method">
					<label for="card" class="method card">
						<div class="card-logos">
							<img src="img/visa_logo.png" />
							<img src="img/mastercard_logo.png" />
						</div>

						<div class="radio-input">
							<input id="card" type="radio" name="payment">
							Pay Rs <?= $amt ?> with credit card
						</div>
					</label>

					<label for="paypal" class="method paypal">
						<img src="img/paypal_logo.png" />
						<div class="radio-input">
							<input id="paypal" type="radio" name="payment">
							Pay Rs <?= $amt ?> with PayPal
						</div>
					</label>
				</div>

				<div class="input-fields">
					<div class="column-1">
						<label for="cardholder">Cardholder's Name</label>
						<input type="text" name="Cname" id="Cname" />

						<div class="small-inputs">
							<div>
								<label for="date">Valid thru</label>
								<input type="text" id="date" name="Cmm" placeholder="MM " list='mnths' minlength="2" maxlength="2" autocomplete="off"/>
								<datalist id='mnths'>
									<?php
									for ($i = 1; $i <= 12; $i++) echo "<option value='" . str_pad($i, 2, '0', STR_PAD_LEFT) . "'>";
									?>
								</datalist>
								<input type="text" id="Cyy" placeholder="YY" list='yrs' minlength="4" maxlength="4" autocomplete="off" />
								<datalist id='yrs'>
									<?php
									$curr = (int)date("Y");
									for ($i = $curr; $i <= $curr+5; $i++) echo "<option value='$i'>";
									?>
								</datalist>
							</div>
							<div>
								<label for="verification">CVV / CVC *</label>
								<input type="password" name="cvv" id="verification" />
							</div>
						</div>

					</div>
					<div class="column-2">
						<label for="cardnumber">Card Number</label>
						<input type="password" name="Cnum" id="cardnumber" />

						<span class="info">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
					</div>
				</div>
			</div>

			<div class="panel-footer">
				<button class="btn back-btn">Back</button>
				<button class="btn next-btn" type="submit" value='submit' name="next">Next Step</button>


			</div>
		</div>
	</form>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="script.js"></script>

</body>

</html>