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
                            <li class="breadcrumb-item"><a href="class_fees_setting_add.php">Class Fees</a></li>
                            <li class="breadcrumb-item active"><a href="class_fees_setting_list.php">Class Fees List</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
        <?php 
            $olddata=array();
            $con['id']=$_GET['id'];
            $result=$mysqli->common_select_single('class_fees_setting','*',$con);
            if($result){
                if($result['data']){
                    $olddata=$result['data'];
                }
            }
       ?>
            <form method="post" action="">
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
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->fees_id ? "selected" :"" ?>><?= $d-> name ?> <?= $d->type ?></option>
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
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->session_id ? "selected" :"" ?>><?= $d-> session ?></option>
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
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->class_id ? "selected" :"" ?>><?= $d-> class ?> </option>
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
                    <input type="text" name="amount" id="amount" value="<?= $olddata->amount ?>" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $_POST['updated_at']=date('Y-m-d H:i:s');
                    $_POST['updated_by']=1;
                    $rs=$mysqli->common_update('class_fees_setting',$_POST,$con);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}class_fees_setting_list.php'</script>";
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
   
    <script src="<?= $baseurl ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= $baseurl ?>assets/js/quixnav-init.js"></script>
    <script src="<?= $baseurl ?>assets/js/custom.min.js"></script>
    
</body>
<?php include('include/footer.php') ?> 
