<?php
require('../config/autoload.php');
$dao = new DataAccess();
if (isset($_SESSION['user_id'])) {
   $a = $_SESSION['user_id'];
   $fields2 = array('id', 'status');
   $bookstat = $dao->getDataJoin($fields2, 'booking', 'user_id=' . $a . ' LIMIT 1');

   if (!empty($bookstat)) {
      if ($bookstat[0]['status'] == 'paymentpending') {
         header('Location: /project15/payment/pendingpayment.php');
      }
   }
}

include("header.php");
?>
<section id="doctors" class="doctors mt-5">
   <div class="container">

      <div class="section-title">
         <p>
         <h2>Doctors</h2>
         </p>
      </div>

      <div class="row">

         <?php
         $fields = array('id', 'name', 'department', 'qualification', 'image');
			if (isset($_GET['id'])) $condition = 'department='.$_GET['id'];
			else $condition = "1";
			$condition .= " ORDER BY department ASC";
         $info = $dao->getData($fields, 'doctor', $condition);
         $depname = $dao->createOptions('id', 'name', 'department');
         foreach ($info as $key => $row) {
            $img = $row['image'];
            $name = $row['name'];
            $dept = $depname[$row['department']];
            $q = $row['qualification'];
            $id = $row['id'];
            echo "<div class='col-lg-6 my-4 mt-lg-0'>
              	<div class=member d-flex align-items-start>
            	   <div class=pic>
         	         <img src=/project15/doctorimage/$img class=img-fluid alt=>
      	         </div>
   	            <div class=member-info>
	                  <h4>$name</h4>
                  	<span>$dept</span>
               	   <p>$q</p>
            	      <a href=appointment.php?id=$id class= appointment-btn scrollto>
         	            <span class=d-none d-md-inline>Make an</span> Book Appointment
      	            </a>
   	            </div>
	            </div>
         	</div>";
         }
         ?>
      </div>

   </div>
</section>

<?php include('footer.php'); ?>