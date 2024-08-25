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
                    <h4>Attendance</h4>
                    <p class="mb-0">Add Attendance</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="student_attendance_list.php">Attendance</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add New</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <form method="get" action="">
            <div class="row">
                <div class="col-md-4">
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
                            <option <?= isset($_GET['class_id']) && $_GET['class_id']==$d->id?"selected":"" ?> value="<?= $d->id ?>" > <?= $d->class ?></option>
                        <?php } } } ?>
                    </select>
                </div>
                <div class="col-md-4">
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
                            <option value="<?= $d->id ?>" <?= isset($_GET['section_id']) && $_GET['section_id']==$d->id?"selected":"" ?>> <?= $d->section ?></option>
                        <?php } } } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-4">Get Student</button>
                </div>
            </div>
            
        </form>
        <form method="post" action="">
            <table class="table">
                <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Student</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($_GET['class_id']) && isset($_GET['section_id'])){
                            $result=$mysqli->common_select_query("select student.name, student_details.* from student
                                                                join student_details on student_details.student_id=student.id
                                                                 where student_details.class_id={$_GET['class_id']}
                                                                  and student_details.section_id={$_GET['section_id']}
                                                                and student_details.deleted_at is null");
                        if($result){
                            if($result['data']){
                                foreach($result['data'] as $sid=>$data){
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="student_id[]" value="<?= $data->student_id ?>" >
                        </td>
                        <td> 
                            <?= $data->name ?>
                        </td>
                        <td>
                            <input type="time" class="form-control" value="<?= date('H:i:s') ?>" name="in_time[<?= $data->student_id ?>]">
                        </td>
                        <td>
                            <input type="time" name="out_time[<?= $data->student_id ?>]" value="<?= date('H:i:s') ?>" class="form-control">
                        </td>
                        <td>
                            <select name="note[<?= $data->student_id ?>]" class="form-control">
                                <option value="P">P</option>
                                <option value="A">A</option>
                                <option value="L">L</option>
                            </select>
                        </td>
                    </tr>
                    <?php } } } } ?>
                </tbody>
            </table>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php 
        if($_POST){
            
            foreach($_POST['student_id'] as $i=>$student_id){
                $att['student_id']=$student_id;
                $att['in_time']=$_POST['in_time'][$student_id];
                $att['out_time']=$_POST['out_time'][$student_id];
                $att['note']=$_POST['note'][$student_id];
                $att['att_date']=date('Y-m-d');
                $att['created_at']=date('Y-m-d H:i:s');
                
                $att['created_by']=$_SESSION['id'];
                
                $rs=$mysqli->common_create('student_attendance',$att);
            }
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

<?php include('include/footer.php') ?> 
