<?php include('include/header.php') ?>
<?php include('include/sidebar.php')?>

<!--**********************************
    Content body start
***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">Your school dashboard</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student_attendance_add.php">Attendance</a></li>
                        <li class="breadcrumb-item active"><a href="student_attendance_list.php">Attendance List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Attendance</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Student ID</th>
                                            <th scope="col">Attendance Date</th>
                                            <th scope="col">In Time</th>
                                            <th scope="col">Out Time</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                            $result=$mysqli->common_select_query('select student_attendance.*, student_details.student_id from student_attendance
                                            join student_details on student_attendance.student_id=student_details.id where student_attendance.deleted_at is null');
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $data){
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data-> student_id ?></td>
                                            <td><?= $data-> att_date ?></td>
                                            <td><?= $data-> in_time ?></td>
                                            <td><?= $data-> out_time ?></td>
                                            <td><?= $data-> note ?></td>
                                            <td>
                                                <span>
                                                    <a href="<?= $baseurl ?>student_attendance_edit.php?id=<?= $data ->id ?>" class="mr-4" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                    <a onclick="return confirm('Are you sure?')" href="<?= $baseurl ?>student_attendance_delete.php?id=<?= $data ->id ?>" data-toggle="tooltip"
                                                        data-placement="top" title="Close"><i
                                                            class="fa fa-close color-danger"></i></a>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php } } } ?>
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--**********************************
    Content body end
***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= $baseurl ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= $baseurl ?>assets/js/quixnav-init.js"></script>
    <script src="<?= $baseurl ?>assets/js/custom.min.js"></script>
    
</body>
<?php include('include/footer.php') ?> 
