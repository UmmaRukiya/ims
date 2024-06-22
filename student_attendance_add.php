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
                            <li class="breadcrumb-item"><a href="student_attendance_add.php">Attendance</a></li>
                            <li class="breadcrumb-item active"><a href="student_attendance_list.php">Attendance List</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
           
            <form method="post" action="">
                <div class="row">
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
                        <label class="form-label" for="att_date">Attendance Date</label>
                        <input type="date" id="att_date" class="form-control" value="<?= date("Y-m-d") ?>" name="att_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="in_time">In_Time</label>
                        <input type="time" id="in_time" class="form-control" value="<?= date('H:i:s') ?>" name="in_time">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="out_time">Out_Time</label>
                        <input type="time" name="out_time" class="form-control" id="out_time" value="<?= date('H:i:s') ?>" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="note">Note</label>
                        <textarea name="note" id="note" class="form-control" placeholder="write a note." ></textarea>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                if($_POST){
                    $_POST['created_at']=date('Y-m-d H:i:s');
                    $_POST['created_by']=$_SESSION['id'];
                   
                    $rs=$mysqli->common_create('student_attendance',$_POST);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}student_attendance_list.php'</script>";
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
