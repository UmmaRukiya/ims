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
                        <input type="text" name="student_id" class="form-control" id="student_id" placeholder="Section name.." >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="class_id">class</label>
                        <select class="form-control form-select" required name="class_id" id="class_id">
                        <option value="">Select Class</option>
                        <?php 
                            $result=$mysqli->common_select('class');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" > <?= $d->class ?></option>
                        <?php } } } ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="section_id">Section</label>
                        <select class="form-control form-select" required name="section_id" id="section_id">
                        <option value="">Select Section</option>
                        <?php 
                            $result=$mysqli->common_select('section');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" > <?= $d->section ?></option>
                        <?php } } } ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="roll">Roll</label>
                        <input type="text" name="roll" class="form-control" id="roll" placeholder="Roll no." >
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
                            <option value="<?= $d->id ?>" > <?= $d->group ?></option>
                        <?php } } } ?>
                    </select>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $_POST['created_at']=date('Y-m-d H:i:s');
                    $_POST['created_by']=$_SESSION['id'];
                   
                    $rs=$mysqli->common_create('student_details',$_POST);
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
