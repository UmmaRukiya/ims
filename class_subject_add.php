<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

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
                            <li class="breadcrumb-item"><a href="subject_add.php">Subject Add</a></li>
                            <li class="breadcrumb-item active"><a href="subject_list.php">Subject List</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
           
            <form method="get" action="">
                 <div class="row">
                    <div class="col-lg-3">
                        <label for="class_id">Class</label>
                        <select class="form-control" id="class_id" name="class_id">
                            <option value="">Select Class</option>
                            <?php 
                                $result=$mysqli->common_select('class');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= isset($_GET['class_id']) && $_GET['class_id']==$d->id?"selected":"" ?>><?= $d->class ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="section_id">Section</label>
                        <select class="form-control" id="section_id" name="section_id">
                            <option value="">Select Section</option>
                            <?php 
                                $result=$mysqli->common_select('section');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                             <option value="<?= $d->id ?>" <?= isset($_GET['section_id']) && $_GET['section_id']==$d->id?"selected":"" ?>><?= $d->section ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                    
                    <div class="col-lg-3 pt-2">
                        <label for="session_id">Session</label>
                        <select class="form-control" id="session_id" name="session_id">
                            <option value="">Select Session </option>
                            <?php 
                                $result=$mysqli->common_select('session');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                             <option value="<?= $d->id ?>" <?= isset($_GET['session_id']) && $_GET['session_id']==$d->id?"selected":"" ?>><?= $d->session ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-3">
                        <label for="term">Exam Term</label>
                        <select class="form-control" id="term_id" name="term_id">
                            <option value="">Select Term</option>
                            <?php 
                                $result=$mysqli->common_select('exam_term');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                            <option value="<?= $d->id ?>" <?= isset($_GET['term_id']) && $_GET['term_id']==$d->id?"selected":"" ?>><?= $d->term ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="subject_id">Subject</label>
                        <select class="form-control" id="subject" name="subject_id">
                            <option value="">Select Subject</option>
                            <?php 
                                $result=$mysqli->common_select('subject');
                                if($result){
                                    if($result['data']){
                                        foreach($result['data'] as $d){
                            ?>
                                 <option value="<?= $d->id ?>" <?= isset($_GET['subject_id']) && $_GET['subject_id']==$d->id?"selected":"" ?>><?= $d->subject_name ?> </option>
                            <?php } } } ?>
                        </select>
                    </div>
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
                        <th>Student</th>
                        <th>Subjective</th>
                        <th>Objective</th>
                        <th>Practical</th>
                        <th>Pass Marks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
          
                         if(isset($_GET['class_id']) && isset($_GET['section_id'])){

                            $result=$mysqli->common_select_query("select student.name,student_details.*
                                                            from student_details
                                                            JOIN student on student.id=student_details.student_id
                                                            where 
                                                            student_details.class_id={$_GET['class_id']} and
                                                            student_details.section_id={$_GET['section_id']} and
                                                            student_details.session_id={$_GET['session_id']} and
                                                            student_details.deleted_at is null 
                                                            ");

                        if($result){
                            if($result['data']){
                                $oldmarks=array();
                                foreach($result['data'] as $sid=>$data){
                                    $rsc['student_id']=$data->student_id;
                                    $rsc['session_id']=$_GET['session_id'];
                                    $rsc['subject_id']=$_GET['subject_id'];
                                    $rsc['class_id']=$_GET['class_id'];
                                    $rsc['term_id']=$_GET['term_id'];
                                    $rs=$mysqli->common_select_single('class_subject','*',$rsc); 
                                    if($rs)
                                        if($rs['data'])
                                            $oldmarks=$rs['data'];
                    ?>                     
                    <tr>
                        <td>
                            <input type="checkbox" name="student_id[]" value="<?= $data->student_id ?>" >
                        </td>
                        <td> 
                            <?= $data->name ?>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="<?= !empty($oldmarks) ? $oldmarks->sub : "" ?>" name="sub[<?= $data->student_id ?>]">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="<?= !empty($oldmarks) ? $oldmarks->obj : "" ?>" name="obj[<?= $data->student_id ?>]">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="<?= !empty($oldmarks) ? $oldmarks->prac : "" ?>" name="prac[<?= $data->student_id ?>]">
                        </td>
                        <td>
                            <input type="text" class="form-control" value="<?= !empty($oldmarks) ? $oldmarks->pass_marks : "" ?>" name="pass_marks[<?= $data->student_id ?>]">
                        </td>
                    </tr>
                                 
                    <?php } } } } ?>
                    
                    </tbody>
                </table>
                <div class="col-lg-10 justify-content-end mt-2 pt-3 mt-sm-0 d-flex">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>


            <?php 
          if($_POST){
            foreach($_POST['student_id'] as $i=>$student_id){
                $att['student_id']=$student_id;         
                $att['session_id']=$_GET['session_id'];
                $att['subject_id']=$_GET['subject_id'];
                $att['class_id']=$_GET['class_id'];
                $att['term_id']=$_GET['term_id'];
                $att['sub']=$_POST['sub'][$student_id];
                $att['obj']=$_POST['obj'][$student_id];
                $att['prac']=$_POST['prac'][$student_id];
                $att['pass_marks']=$_POST['pass_marks'][$student_id];
                $att['created_at']=date('Y-m-d H:i:s');
                $att['created_by']=1;

                $con['student_id']=$att['student_id'];
                $con['session_id']=$att['session_id'];
                $con['subject_id']=$att['subject_id'];
                $con['class_id']=$att['class_id'];
                $con['term_id']=$att['term_id'];
                $rs=$mysqli->common_update('class_subject',$att,$con); 
                if($rs)
                    if(!$rs['data'])
                        $rs=$mysqli->common_create('class_subject',$att);
            }
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

 
<?php include('include/footer.php') ?> 


  