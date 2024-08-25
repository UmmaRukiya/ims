<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Student</h4>
                    <span class="ml-1">Add New</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="student_list.php">Student List</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add New</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Form</h4>
                    </div>
        <?php 
            $olddata=$classdata=array();
            $con['id']=$_GET['id'];
            $result=$mysqli->common_select_single('student','*',$con);
            if($result){
                if($result['data']){
                    $olddata=$result['data'];
                }
            }
            $cons['student_id']=$_GET['id'];
            $result=$mysqli->common_select_single('student_details','*',$cons);
            if($result){
                if($result['data']){
                    $classdata=$result['data'];
                }
            }
       ?>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?= $olddata-> name ?>" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control" value="<?= $olddata->photo ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Father</label>
                                        <input type="text" name="father_name" id="father_name" class="form-control" value="<?= $olddata->father_name ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Mother</label>
                                        <input type="text" name="mother_name" id="mother_name" class="form-control" value="<?= $olddata->mother_name ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label> Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?= $olddata->email ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Contact</label>
                                        <input type="text"  name="contact" id="contact" class="form-control" value="<?= $olddata->contact ?>">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label>User Name</label>
                                        <input type="text" name="username" id="username" class="form-control" value="<?= $olddata->username ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password"  name="password" id="password" class="form-control" value="<?= $olddata->password ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="class_id">class</label>
                                        <select class="form-control form-select" required name="class_id" id="class_id">
                                        <option value="">Select Class</option>
                                        <?php 
                                            $result=$mysqli->common_select('class');
                                            if($result){
                                                if($result['data']){
                                                    foreach($result['data'] as $d){
                                        ?>
                                            <option value="<?= $d->id ?>" <?= $d->id==$classdata->class_id ? "selected" :"" ?>> <?= $d->class ?></option>
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
                                                    foreach($result['data'] as $d){
                                        ?>
                                            <option value="<?= $d->id ?>"<?= $d->id==$classdata->section_id ? "selected" :"" ?> > <?= $d->section ?></option>
                                        <?php } } } ?>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="roll">Roll</label>
                                        <input type="text" name="roll" class="form-control" id="roll"  value="<?= $classdata->roll ?>">
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
                                            <option value="<?= $d->id ?>" <?= $d->id==$classdata->group_id ? "selected" :"" ?> > <?= $d->group ?></option>
                                        <?php } } } ?>
                                    </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="session_id">Session</label>
                                        <select class="form-control form-select" required name="session_id" id="session_id">
                                        <option value="">Select Group</option>
                                        <?php 
                                            $result=$mysqli->common_select('session');
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $d){
                                        ?>
                                            <option value="<?= $d->id ?>" <?= $d->id==$classdata->session_id ? "selected" :"" ?>> <?= $d->session ?></option>
                                        <?php } } } ?>
                                    </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
    <?php 
        if($_POST){

            if($_FILES){
            
                $img=$_FILES["photo"];
    
                if($img['size'] < (100*1024)){
                    if($img['type'] =="image/jpeg"){
                        $imagename=time().rand(1111,9999).".jpg";
                        $rs=move_uploaded_file($img['tmp_name'],'assets/students/'.$imagename);
                        if($rs){
                            $stu['photo']=$imagename;
                        }
                    }else{
                        echo "Only image can be uploaded.";
                    }
                }else{
                    echo "File size cannot be more than 100KB";
                }
            }

            
            if($_POST){
                $stu['name']=$_POST['name'];
                $stu['father_name']=$_POST['father_name'];
                $stu['mother_name']=$_POST['mother_name'];
                $stu['email']=$_POST['email'];
                $stu['contact']=$_POST['contact'];
                $stu['username']=$_POST['username'];
                if($_POST['password'])
                    $stu['password']=$_POST['password'];

                $stu['updated_at']=date('Y-m-d H:i:s');
                $stu['updated_by']=1;
                $rs=$mysqli->common_update('student',$stu,$con);
                if($rs){
                    $stud['student_id']=$rs['data'];
                    $stud['class_id']=$_POST['class_id'];
                    $stud['section_id']=$_POST['section_id'];
                    $stud['roll']=$_POST['roll'];
                    $stud['group_id']=$_POST['group_id'];
                    $stud['session_id']=$_POST['session_id'];
                    $stud['updated_at']=date('Y-m-d H:i:s');
                    $stud['updated_by']=1;
                    $cons['id']=$classdata->id;
                    $st=$mysqli->common_update('student_details',$stud,$cons);

                    if($rs['data']){
                        echo "<script>window.location='{$baseurl}student_list.php'</script>";
                    }else{
                        echo $rs['error'];
                    }
                }
            }
        }
    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->

<?php include('include/footer.php') ?> 
