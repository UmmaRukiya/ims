<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>


<body>
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
           
            <form method="post" action="">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="student_fees_id">Student fees ID</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="student_fees_id" name="student_fees_id">
                            <option value="">Select Student ID</option>
                            <?php 
                                $result=$mysqli->common_select('student_fees');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>"><?= $d-> student_id ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="fees_id">Fees</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="fees_id" name="fees_id">
                            <option value="">Select Fees ID</option>
                            <?php 
                                $result=$mysqli->common_select('fees_category');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>"><?= $d-> name ?> <?= $d->type ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="amount">Amount</label>
                    <input type="text" name="amount" id="amount" >
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="fees_date">Fees Date</label>
                    <input type="date" name="fees_date" id="fees_date" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $_POST['created_at']=date('Y-m-d H:i:s');
                    $_POST['created_by']=1;
                    $rs=$mysqli->common_create('student_fees_details',$_POST);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}student_fees_details_list.php'</script>";
                        }else{
                            echo $rs['error'];
                        }
                    }
                }
            ?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

<?php include('include/footer.php') ?> 
