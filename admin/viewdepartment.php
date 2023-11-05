<?php
require('../config/autoload.php');
$dao = new DataAccess();
include('header.php');
?>
<h1 class="h3 mb-3"><strong>Department</strong></h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Departments List</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover mt-0 mb-3 ms-3 me-5">
                    <thead>
                        <tr>
                            <th>Department Id</th>
                            <th>Department Name</th>
                            <th>Image</th>
                            <th>EDIT/DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $actions = array(
                            'edit' => array(
                                'label' => 'Edit',
                                'link' => 'editdepartmentimage.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array(
                                    'class' => 'btn btn-success'
                                )
                            ),
                            'delete' => array(
                                'label' => 'Delete',
                                'link' => 'deletedept.php',
                                'params' => array('id' => 'id'),
                                'attributes' => array(
                                    'class' => 'btn btn-success'
                                )
                            )
                        );
                        $config = array(
                            'srno' => true,
                            'hiddenfields' => array('id'),
                            'images' => array(
                                array(
                                    'field' => "image",
                                    'path' => "../images/",
                                    "attributes" => array("height" => '100')
                                )
                            )
                        );
                        $join = array();
                        $fields = array('id', 'name', 'image');
                        $users = $dao->selectAsTable($fields, 'department', 1, $join, $actions, $config);
                        echo $users;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>