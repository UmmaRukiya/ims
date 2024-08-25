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
           
            <form method="get" action="">
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
                   
                    <div class="col-lg-10 justify-content-start mt-2 pt-3 mt-sm-0 d-flex">
                    <button type="submit" class="btn btn-primary">Get Student</button>
                </div>
            </form>
            <form action="" method="post">
            <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Total Marks</th>
                            <th>Pass marks</th>
                            <th>Subjective</th>
                            <th>Objective</th>
                            <th>Practical</th>
                            <th>Gp</th>
                            <th>Gpl</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                             if(isset($_GET['class_id']) && isset($_GET['section_id'])){

                                $result=$mysqli->common_select_query("select subject.subject_name, class_subject.* 
                                    from class_subject
                                    join subject on subject.id=class_subject.subject_id
                                    where 
                                    class_subject.class_id={$_GET['class_id']}
                                    and class_subject.session_id={$_GET['session_id']}
                                    and class_subject.group_id={$_GET['group_id']}
                                    and class_subject.deleted_at is null");
                                                           
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $sid=>$data){
                        ?>
                                            <tr>
                                                <td>
                                                 <input type="checkbox" name="subject_id[]" value="<?= $data->subject_id ?>" >
                                                </td>
                                                <td> 
                                                     <?= $data->subject_name ?>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" value=" " name="total_marks[<?= $data->subject_id ?>]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value=" " name="pass_marks[<?= $data->subject_id ?>]">
                                                 </td>
                                                <td>
                                                    <input type="text" class="form-control" value=" " name="sub[<?= $data->subject_id ?>]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value=" " name="obj[<?= $data->subject_id ?>]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value=" " name="prac[<?= $data->subject_id ?>]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value=" " name="gp[<?= $data->subject_id ?>]">
                                                 </td>
                                                 <td>
                                                    <input type="text" class="form-control" value=" " name="gpl[<?= $data->subject_id ?>]">
                                                 </td>
                                               
                                            </tr>
                                    
                        <?php } } } }  ?>
                        
                    </tbody>
                </table>
                <div class="col-lg-10 justify-content-end mt-2 pt-3 mt-sm-0 d-flex">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <?php 
            if($_POST){
             foreach($_POST['subject_id'] as $i=>$subject_id){
                    $att['subject_id']=$subject_id;
                    $att['sub']=$_POST['total_marks'][$subject_id];
                    $att['pass_marks']=$_POST['pass_marks'][$subject_id];
                    $att['sub']=$_POST['sub'][$subject_id];
                    $att['obj']=$_POST['obj'][$subject_id];
                    $att['prac']=$_POST['prac'][$subject_id];
                    $att['prac']=$_POST['gp'][$subject_id];
                    $att['prac']=$_POST['gpl'][$subject_id];
                    $att['created_at']=date('Y-m-d H:i:s');
                    $att['created_by']=$_SESSION['id'];
                    $rs=$mysqli->common_create('student_marks',$att);       
                }
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
