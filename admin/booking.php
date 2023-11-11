<?php
require('../config/autoload.php');
$dao = new DataAccess();
include('header.php');
?>
<h1 class="h3 mb-3"><strong>Bookings</strong></h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Bookings List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover mt-0 mb-3 ms-3 me-5">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Booking Time</th>
                            <th>Slot</th>
                            <th>Booking Date</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $actions = array(
                            'edit' => array(
                                'label' => '<i class="align-middle" data-feather="edit"></i>',
                                'link' => 'editbooking.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array('class' => 'btn btn-warning')
                            ),
                            'delete' => array(
                                'label' => '<i class="align-middle" data-feather="trash-2"></i>',
                                'link' => 'deletebooking.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array('class' => 'btn-del btn btn-danger')
                            )
                        );
                        $config = array();
                        $join = array(
                            'user u' => array('b.user_id=u.id', 'join'),
                            'doctor d' => array('b.doctor_id=d.id', 'join'),
                        );
                        $fields = array('b.id', 'u.name as u_name', 'd.name as doctor_name', 'b.appo_time', 'b.slot', 'b.appo_date', 'u.phone');
                        $users = $dao->selectAsTable($fields, 'booking as b', 'b.id=b.id ORDER BY b.id DESC', $join, $actions, $config);
                        echo $users;
                        //  $d=$dao->getData(array('b.*,d.*,u.*'),"booking b JOIN doctor d ON b.doctor_id = d.id JOIN user u ON b.user_id = u.id");
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="model-del" class="modal">

    <!-- Modal content -->
    <div class="modal-content overflow-hidden col-2 rounded-3">
        <div class="text-center">
            <p>Are you sure you want to delete this?</p>
        </div>
        <div class="row">
            <div class="col text-center">
                <button id="btn-confirm" class="btn btn-danger btn-sm">Delete</button>
            </div>
            <div class="col text-center">
                <button id="btn-cancel" class="btn btn-secondary btn-sm">Cancel</button>
            </div>
        </div>
    </div>

</div>
<script>
   document.addEventListener("DOMContentLoaded", function() {
      var modal = document.getElementById("model-del");
      var confirmButton = document.getElementById("btn-confirm");
      var cancelButton = document.getElementById("btn-cancel");
      var redirectUrl;

      // Add event listener to all elements with the class "btn-del"
      var openModalButtons = document.querySelectorAll(".btn-del");
      openModalButtons.forEach(function(button) {
         button.onclick = function(e) {
            e.preventDefault(); // Prevent the default behavior of the anchor tag
            redirectUrl = button.getAttribute("href");
            modal.style.display = "block";
         };
      });

      confirmButton.onclick = function() {
         if (redirectUrl) {
            window.location.href = redirectUrl;
         }
      };

      cancelButton.onclick = function() {
         modal.style.display = "none";
      };

      window.onclick = function(event) {
         if (event.target == modal) {
            modal.style.display = "none";
         }
      };
   });
</script>


<?php include("footer.php"); ?>