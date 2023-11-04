<?php
require('../config/autoload.php');
$dao = new DataAccess();
include('header.php');
?>
<h1 class="h3 mb-3"><strong>Doctors</strong></h1>
<div class="row">
    <div class="col-lg-12 d-flex">
        <div class="card">
            <div class="card-body">
            <div class="card-header">
                <h5 class="card-title mb-0">Doctors List</h5>
            </div>
            <table class="table table-bordered table-hover mt-0 mb-3 ms-3 me-5">
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
                        <th>Age</th>
                        <th>EDIT/DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $actions = array(
                        'edit' => array(
                            'label' => 'Edit',
                            'link' => 'editdoctorimage.php',
                            'params' => array('id' => 'id'),
                            'attributes' => array(
                                'class' => 'btn btn-warning'
                            )
                        ),
                        'delete' => array(
                            'label' => 'Delete',
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
                                "attributes" => array("class"=>"img-fluid mb-2")
                            )
                        ),
                    );

                    $join = array();
                    $fields = array('id', 'name', 'gender', 'department', 'qualification', 'address', 'image', 'phone', 'age');
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