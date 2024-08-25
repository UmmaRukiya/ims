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
                        <li class="breadcrumb-item"><a href="student_fees_add.php">Student Fees</a></li>
                        <li class="breadcrumb-item active"><a href="student_fees_list.php">Student Fees List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Fees List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Student ID</th>
                                                <th scope="col">Session</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Group</th>
                                                <th scope="col">Amount</th>                                              
                                                <th scope="col">Fees Waiver</th>                                              
                                                <th scope="col">Fees Month</th>                                              
                                                <th scope="col">Due</th>                                              
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php 
                                            $result=$mysqli->common_select_query("select student_fees.*, student.name, session.session, class.class, `group`.`group` from student_fees 
                                            join student_details on student_fees.student_id= student_details.student_id
                                            join student on student_fees.student_id= student.id
                                            join session on student_fees.session_id= session.id
                                            join class on student_fees.class_id= class.id
                                            join `group` on student_fees.group_id=`group`.id ");
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $data){
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data->name ?></td>
                                            <td><?= $data->session ?></td>
                                            <td><?= $data->class ?></td>
                                            <td><?= $data->group ?></td>
                                            <td><?= $data->amount ?></td>
                                            <td><?= $data->discount ?></td>
                                            <td><?= date('F',strtotime('01.'.$data->fees_month.'.2001'))?>, <?= $data->fees_year ?></td>
                                            <td><?= $data-> total_amount - $data-> pay ?></td>
                                            <td>
                                            <span>
                                                    <a href="<?= $baseurl ?>student_fees_edit.php?id=<?= $data ->id ?>" class="mr-4" data-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        <i class="fa fa-money color-muted"></i>
                                                    </a>
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
