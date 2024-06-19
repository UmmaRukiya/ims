<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>


<body>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
        <?php 
            $olddata=array();
            $con['id']=$_GET['id'];
            $result=$mysqli->common_select_single('class_subject','*',$con);
            if($result){
                if($result['data']){
                    $olddata=$result['data'];
                }
            }
       ?>
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
           
            <form method="post" action="">
                <div class="row">
                  
                    <div class="col-md-6">
                        <label class="form-label" for="subject_id">Subject</label>
                        <select class="form-control form-select" required name="subject_id" id="subject_id">
                        <option value="">Select Subject</option>
                        <?php 
                            $result=$mysqli->common_select('subject');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->subject_id ? "selected" :"" ?>> <?= $d-> subject_name ?> <?= $d-> subject_type ?></option>
                        <?php } } } ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="class_id">Class</label>
                        <select class="form-control form-select" required name="class_id" id="class_id">
                        <option value="">Select Class</option>
                        <?php 
                            $result=$mysqli->common_select('class');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->class_id ? "selected" :"" ?>> <?= $d->class ?></option>
                        <?php } } } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="group_id">Group</label>
                        <select class="form-control form-select" required name="group_id" id="group_id">
                            <option value="">Select Group</option>
                            <?php 
                                $result=$mysqli->common_select('`group`');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                                <option value="<?= $d->id ?>" <?= $d->id==$olddata->group_id ? "selected" :"" ?> > <?= $d-> group ?></option>
                            <?php } } } ?>
                       </select>
                    </div>
                 
                    <div class="col-md-6">
                        <label class="form-label" for="session_id">Session</label>
                        <select class="form-control form-select" required name="session_id" id="session_id">
                            <option value="">Select Session</option>
                            <?php 
                                $result=$mysqli->common_select('session');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                                <option value="<?= $d->id ?>" <?= $d->id==$olddata->session_id ? "selected" :"" ?>> <?= $d->session ?></option>
                            <?php } } } ?>
                       </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="sub">Subjective</label>
                        <input type="text" name="sub" class="form-control" id="sub" value="<?= $olddata-> sub ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="obj">Objective</label>
                        <input type="text" name="obj" class="form-control" id="obj" value="<?= $olddata-> obj ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="prac">Practical</label>
                        <input type="text" name="prac" class="form-control" id="prac" value="<?= $olddata-> prac ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="pass_marks">Pass Marks</label>
                        <input type="text" name="pass_marks" class="form-control" id="pass_marks" value="<?= $olddata-> pass_marks ?>">
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $_POST['updated_at']=date('Y-m-d H:i:s');
                    $_POST['updated_by']=1;
                    $rs=$mysqli->common_update('class_subject',$_POST,$con);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}class_subject_list.php'</script>";
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
