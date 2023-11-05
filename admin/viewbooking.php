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
                            <th>EDIT/DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $actions = array(
                            'edit' => array(
                                'label' => 'Edit',
                                'link' => 'editbooking.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array('class' => 'btn btn-success')
                            ),
                            'delete' => array(
                                'label' => 'Delete',
                                'link' => 'deletebooking.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array('class' => 'btn btn-success')
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
<?php include("footer.php"); ?>