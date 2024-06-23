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
                        <li class="breadcrumb-item"><a href="student_fees_details_add.php">Student Fees</a></li>
                        <li class="breadcrumb-item active"><a href="student_fees_details_list.php">Student Fees Details</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Fees Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Student Fees ID</th>
                                                <th scope="col">Fees</th>
                                                <th scope="col">Amount</th>                                              
                                                <th scope="col">Fees Date</th>                                              
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php 
                                            $result=$mysqli->common_select_query("select student_fees_details.*, fees_category.name, student_fees.student_id from student_fees_details 
                                            join fees_category on student_fees_details.fees_id= fees_category.id
                                            join student_fees on student_fees_details.student_fees_id=student_fees.id where student_fees_details.deleted_at is null");
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $data){
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data-> name ?></td>
                                            <td><?= $data-> student_id ?></td>
                                            <td><?= $data-> amount ?></td>
                                            <td><?= $data-> fees_date ?></td>
                                            
                                            <td>
                                            <span>
                                                    <a href="<?= $baseurl ?>student_fees_details_edit.php?id=<?= $data ->id ?>" class="mr-4" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                    <a href="<?= $baseurl ?>student_fees_details_delete.php?id=<?= $data ->id ?>" data-toggle="tooltip"
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
