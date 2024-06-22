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
                        <li class="breadcrumb-item"><a href="class_subject_add.php">Class's Subject</a></li>
                        <li class="breadcrumb-item active"><a href="class_subject_list.php">Class Subject List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Class's Subject</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Group</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Subjective</th>
                                                <th scope="col">Objective</th>
                                                <th scope="col">Practical</th>
                                                <th scope="col">Pass Marks</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    <?php 
                                        $result=$mysqli->common_select_query("select class_subject.id, subject.subject_name, class.class, `group`.`group`, session.session, class_subject.sub, class_subject.obj, class_subject.prac, class_subject.pass_marks from class_subject
                                        join subject on class_subject.subject_id= subject.id
                                        join class on class_subject.class_id=class.id
                                        join `group` on class_subject.group_id = `group`.id
                                        inner join session on class_subject.session_id = session.id where class_subject.deleted_at is null");
                                        if($result){
                                            if($result['data']){
                                                $i=1;
                                                foreach($result['data'] as $data){
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data-> subject_name ?></td>
                                            <td><?= $data-> class ?></td>
                                            <td><?= $data-> group ?></td>
                                            <td><?= $data-> session ?></td>
                                            <td><?= $data-> sub ?></td>
                                            <td><?= $data-> obj ?></td>
                                            <td><?= $data-> prac ?></td>
                                            <td><?= $data-> pass_marks ?></td>
                                            <td>
                                            <span>
                                                    <a href="<?= $baseurl ?>class_subject_edit.php?id=<?= $data ->id ?>" class="mr-4" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                    <a href="<?= $baseurl ?>class_subject_delete.php?id=<?= $data ->id ?>" data-toggle="tooltip"
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
