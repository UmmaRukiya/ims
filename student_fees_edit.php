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
                        <select class="form-control" id="student_id" name="student_id">
                            <option value="">Select Student ID</option>
                            <?php 
                                $result=$mysqli->common_select('student_details');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->student_id ? "selected" :"" ?>><?= $d-> student_id ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="session_id">Session</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="session_id" name="session_id">
                            <option value="">Select Session</option>
                            <?php 
                                $result=$mysqli->common_select('session');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>"<?= $d->id==$olddata->session_id ? "selected" :"" ?>><?= $d-> session ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="class_id">Class</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="class_id" name="class_id">
                            <option value="">Select Class</option>
                            <?php 
                                $result=$mysqli->common_select('class');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>"  <?= $d->id==$olddata->class_id ? "selected" :"" ?>><?= $d-> class ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="group_id">Group</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="group_id" name="group_id">
                            <option value="">Select Group </option>
                            <?php 
                                $result=$mysqli->common_select('`group`');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->group_id ? "selected" :"" ?>><?= $d-> group ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="amount">Amount</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="amount" name="amount">
                            <option value="">Select Amount </option>
                            <?php 
                                $result=$mysqli->common_select('class_fees_setting');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->amount ? "selected" :"" ?>><?= $d-> amount ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="discount">Discount</label>
                    <input type="text" name="discount" id="discount" value="<?= $olddata->discount ?>" >
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="fees_date">Fees Date</label>
                    <input type="date" name="fees_date" id="fees_date" value="<?= $olddata->fees_date ?>" >
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="due">Due</label>
                    <input type="text" name="due" id="due" value="<?= $olddata->due ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $_POST['updated_at']=date('Y-m-d H:i:s');
                    $_POST['updated_by']=1;
                    $rs=$mysqli->common_update('student_fees',$_POST,$con);
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
