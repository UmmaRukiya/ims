<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Student </h4>
                    <p class="mb-0">Student information</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="student_list.php">Student</a></li>
                    <li class="breadcrumb-item active"><a href="#">List</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Section</th>
                                        <th scope="col">Group</th>
                                        <th scope="col">Session</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $result=$mysqli->common_select_query('select student.id, student.name, student.contact, class.class,
                                                                            section.section,`group`.`group`, session.session, student.photo from student
                                                                            join student_details on student.id=student_details.student_id
                                                                            join class on student_details.class_id=class.id
                                                                            join section on student_details.section_id=section.id
                                                                            join `group` on student_details.group_id=`group`.id 
                                                                            join session on student_details.session_id=session.id  where student.deleted_at is null');
                                    if($result){
                                        if($result['data']){
                                            $i=1;
                                            foreach($result['data'] as $data){
                                ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data-> name ?></td>
                                    <td><?= $data-> contact ?></td>
                                    <td><?= $data-> class ?></td>
                                    <td><?= $data-> section ?></td>
                                    <td><?= $data-> group ?></td>
                                    <td><?= $data-> session ?></td>
                                    <td><img src="<?= $baseurl ?>assets/students/<?= $data->photo ?>" width="80px" alt=""></td>
                                    <td>
                                        <span>
                                            <a href="<?= $baseurl ?>student_edit.php?id=<?= $data ->id ?>" class="mr-4" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa fa-pencil color-muted"></i> </a>
                                            <a href="<?= $baseurl ?>student_delete.php?id=<?= $data ->id ?>" data-toggle="tooltip"
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
    
<?php include('include/footer.php') ?> 
