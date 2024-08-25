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
                            <li class="breadcrumb-item"><a href="student_fees_add.php">Student Fees</a></li>
                            <li class="breadcrumb-item active"><a href="student_fees_list.php">Student Fees List</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
        <?php 
            $olddata=array();
            $con['id']=$_GET['id'];
            $result=$mysqli->common_select_single('student_fees','*',$con);
            if($result){
                if($result['data']){
                    $olddata=$result['data'];
                }
            }
       ?>
            <form method="post" action="">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="student_id">Student</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="student_id" name="student_id" disabled>
                            <option value="">Select Student ID</option>
                            <?php 
                                $result=$mysqli->common_select('student');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->student_id ? "selected" :"" ?>><?= $d->name ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="session_id">Month</label>
                    <div class="col-lg-6">
                        <select name="fees_month" id="fees_month" class="form-control" disabled>
                            <?php for($i=1;$i<13;$i++){ ?>
                                <option <?= $olddata->fees_month==date('m',strtotime('01.'.$i.'.2001'))?"selected":"" ?> value='<?= date('m',strtotime('01.'.$i.'.2001'))?>'><?= date('F',strtotime('01.'.$i.'.2001'))?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="class_id">Class</label>
                    <div class="col-lg-6">
                        <select name="fees_year" id="fees_year" class="form-control" disabled>
                            <?php for($i=2024;$i<= date('Y'); $i++){ ?>
                                <option <?= $olddata->fees_year==$i?"selected":"" ?> value='<?= $i ?>'><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="amount">Amount</label>
                    <div class="col-lg-6"><?= $olddata->total_amount ?></div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="discount">Paid</label>
                    <div class="col-lg-6"><?= $olddata->pay ?></div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="discount">Due</label>
                    <div class="col-lg-6"><input type="text" class="form-control" value="<?= $olddata->total_amount - $olddata->pay ?>" name="pay"></div>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $pur['pay']=( $olddata->pay + $_POST['pay']);
                    $pur['updated_at']=date("Y-m-d H:i:s");
                    $pur['updated_by']=1;
                    $rs=$mysqli->common_update('student_fees',$pur,$con);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}student_fees_list.php'</script>";
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
