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
                            <li class="breadcrumb-item"><a href="student_marks_add.php">Student Marks</a></li>
                            <li class="breadcrumb-item active"><a href="student_marks_list.php">Student Marks List</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
           
            <form method="post" action="">
                <div class="row">
                  
                    <div class="col-md-6">
                        <label class="form-label" for="subject_id">Subject</label>
                        <select class="form-control form-select" required name="subject_id" id="subject_id">
                        <option value="">Select Subject ID</option>
                        <?php 
                            $result=$mysqli->common_select('subject');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" > <?= $d-> subject_name ?> <?= $d-> subject_type ?></option>
                        <?php } } } ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="student_id">Student ID</label>
                        <select class="form-control form-select" required name="student_id" id="student_id">
                        <option value="">Select Student</option>
                        <?php 
                            $result=$mysqli->common_select('student_details');
                            if($result){
                                if($result['data']){
                                    $i=1;
                                    foreach($result['data'] as $d){
                        ?>
                            <option value="<?= $d->id ?>" > <?= $d-> student_id ?> </option>
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
                        <label class="form-label" for="group_id">Group</label>
                        <select class="form-control form-select" required name="group_id" id="group_id">
                            <option value="">Select Group ID</option>
                            <?php 
                                $result=$mysqli->common_select('`group`');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                                <option value="<?= $d->id ?>" > <?= $d-> group ?></option>
                            <?php } } } ?>
                       </select>
                    </div>
                 
                    <div class="col-md-6">
                        <label class="form-label" for="session_id">Session</label>
                        <select class="form-control form-select" required name="session_id" id="session_id">
                            <option value="">Select Session ID</option>
                            <?php 
                                $result=$mysqli->common_select('session');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                                <option value="<?= $d->id ?>" > <?= $d->session ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="total_marks">Total Marks</label>
                        <input type="text" name="total_marks" class="form-control" id="total_marks" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="pass_marks">Pass Marks</label>
                        <select class="form-control form-select" required name="pass_marks" id="pass_marks">
                            <option value="">Select Pass Marks</option>
                            <?php 
                                $result=$mysqli->common_select('class_subject');
                                if($result){
                                    if($result['data']){
                                        $i=1;
                                        foreach($result['data'] as $d){
                            ?>
                                <option value="<?= $d->id ?>" > <?= $d->pass_marks ?></option>
                            <?php } } } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="sub">Subjective</label>
                        <input type="text" name="sub" class="form-control" id="sub" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="obj">Objective</label>
                        <input type="text" name="obj" class="form-control" id="obj" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="prac">Practical</label>
                        <input type="text" name="prac" class="form-control" id="prac" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="gp">GP</label>
                        <input type="text" name="gp" class="form-control" id="gp" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="gpl">GPL</label>
                        <input type="text" name="gpl" class="form-control" id="gpl" >
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $_POST['created_at']=date('Y-m-d H:i:s');
                    $_POST['created_by']=$_SESSION['id'];
                   
                    $rs=$mysqli->common_create('student_marks',$_POST);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}student_marks_list.php'</script>";
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
