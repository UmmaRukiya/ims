<?php include('include/header.php') ; ?>
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
            $result=$mysqli->common_select_single('student_details','*',$con);
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
                            <li class="breadcrumb-item"><a href="section_add.php">Section</a></li>
                            <li class="breadcrumb-item active"><a href="section_list.php">Section Table</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
            <form method="post" action="">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="student_id">Student ID</label>
                        <input type="text" name="student_id" class="form-control" id="student_id"  value="<?= $olddata-> student_id ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="class_id">class</label>
                        <select class="form-control form-select" required name="class_id" id="class_id" >
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
                        <label class="form-label" for="section_id">Section</label>
                        <select class="form-control form-select" required name="section_id" id="section_id" >
                        <option value="">Select Section</option>
                        <?php 
                            $result=$mysqli->common_select('section');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->section_id ? "selected" :"" ?>> <?= $d->section ?></option>
                        <?php } } } ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="roll">Roll</label>
                        <input type="text" name="roll" class="form-control" id="roll" placeholder="Roll no." value="<?= $olddata-> roll ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="group_id">Group</label>
                        <select class="form-control form-select" required name="group_id" id="group_id" value="<?= $olddata-> group_id ?>">
                        <option value="">Select Group</option>
                        <?php 
                            $result=$mysqli->common_select('`group`');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->group_id ? "selected" :"" ?>> <?= $d->group ?></option>
                        <?php } } } ?>
                    </select>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
            <?php 
                if($_POST){
                    $_POST['updated_at']=date('Y-m-d H:i:s');
                    $_POST['updated_by']=1;
                    $rs=$mysqli->common_update('student_details',$_POST,$con);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}student_details_list.php'</script>";
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
