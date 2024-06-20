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
                        <li class="breadcrumb-item"><a href="student_marks_add.php">Student Marks</a></li>
                        <li class="breadcrumb-item active"><a href="student_marks_list.php">Student Marks List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Marks</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Subject ID</th>
                                                <th scope="col">Student ID</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Section</th>
                                                <th scope="col">Group</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Total Marks</th>
                                                <th scope="col">Pass Marks</th>
                                                <th scope="col">Subjective</th>
                                                <th scope="col">Objective</th>
                                                <th scope="col">Practical</th>
                                                <th scope="col">GP</th>
                                                <th scope="col">GPL</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    <?php 
                                        $result=$mysqli->common_select_query("select student_marks.id, subject.subject_name, student_details.student_id, class.class, section.section, `group`.`group`, session.session, student_marks.total_marks, student_marks.sub, student_marks.obj, student_marks.prac, class_subject.pass_marks, student_marks.gp, student_marks.gpl from student_marks
                                        join subject on student_marks.subject_id= subject.id
                                        join student_details on student_marks.student_id= student_details.id
                                        join class on student_marks.class_id=class.id
                                        join section on student_marks.class_id=section.id
                                        join `group` on student_marks.group_id = `group`.id
                                        join session on student_marks.session_id = session.id 
                                        join class_subject on student_marks.pass_marks = class_subject.id ");
                                        if($result){
                                            if($result['data']){
                                                $i=1;
                                                foreach($result['data'] as $data){
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data-> subject_name ?></td>
                                            <td><?= $data-> student_id ?></td>
                                            <td><?= $data-> class ?></td>
                                            <td><?= $data-> section ?></td>
                                            <td><?= $data-> group ?></td>
                                            <td><?= $data-> session ?></td>
                                            <td><?= $data-> total_marks ?></td>
                                            <td><?= $data-> pass_marks ?></td>
                                            <td><?= $data-> sub ?></td>
                                            <td><?= $data-> obj ?></td>
                                            <td><?= $data-> prac ?></td>
                                            <td><?= $data-> gp ?></td>
                                            <td><?= $data-> gpl ?></td>
                                            <td>
                                            <span>
                                                    <a href="<?= $baseurl ?>student_marks_edit.php?id=<?= $data ->id ?>" class="mr-4" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                    <a href="<?= $baseurl ?>student_marks_delete.php?id=<?= $data ->id ?>" data-toggle="tooltip"
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
