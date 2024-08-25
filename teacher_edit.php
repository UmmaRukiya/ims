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
                            <p class="mb-1">Validation</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teacher_list.php">Teacher List</a></li>
                             
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Validation</h4>
                            </div>
                            <?php 
            $olddata=array();
            $con['id']=$_GET['id'];
            $result=$mysqli->common_select_single('teacher','*',$con);
            if($result){
                if($result['data']){
                    $olddata=$result['data'];
                }
            }
       ?>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide"  method="post" enctype="multipart/form-data">
                                    <div class="row">
                            <div class="col-lg-6">
                                <!-- First Column -->
                                <div class="form-group">
                                    <label for="name">Teacher's Name </label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $olddata-> name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="father_name">Father's Name </label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="<?= $olddata-> father_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?= $olddata-> mother_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" value="<?= $olddata-> contact ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email></label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $olddata-> email ?>">
                                </div>
                                <div class="form-group">
                                <label class="form-label" for="department_id">Department</label>
                                        <select class="form-control form-select" required name="department_id" id="department_id" value="<?= $olddata-> department_id ?>">
                                        <option value="">Select Department</option>
                                        <?php 
                                            $result=$mysqli->common_select('department');
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $d){
                                        ?>
                                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->department_id ? "selected" :"" ?>> <?= $d->department ?></option>
                                        <?php } } } ?>
                                    </select>
                                </div>
                                <!-- Continue adding other fields -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Second Column -->
                                <div class="form-group">
                                    <label for="qualification">Qualification</label>
                                    <input type="text" class="form-control" id="qualification" name="qualification" value="<?= $olddata-> qualification ?>">
                                </div>
                                <div class="form-group">
                                    <label for="assigned_class">Assigned Class </label>
                                    <input type="text" class="form-control" id="assigned_class" name="assigned_class" value="<?= $olddata-> assigned_class ?>">
                                </div>
                                <div class="form-group">
                                    <label for="joining">Joining Date</label>
                                    <input type="date" class="form-control" id="joining" name="joining" value="<?= $olddata-> joining ?>">
                                </div>
                                <div class="form-group">
                                    <label for="resign">Resign Date</label>
                                    <input type="date" class="form-control" id="resign" name="resign" value="<?= $olddata-> resign ?>">
                                </div>
                                <div class="form-group">
                                    <label for="designation_id">Designation</label>
                                    <select class="form-control form-select" required name="designation_id" id="designation_id">
                                        <option value="">Select Department</option>
                                        <?php 
                                            $result=$mysqli->common_select('designation');
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $d){
                                        ?>
                                            <option value="<?= $d->id ?>" <?= $d->id==$olddata->designation_id ? "selected" :"" ?>> <?= $d->designation ?></option>
                                        <?php } } } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="val-currency">Photo</label>
                                    <input type="file" class="form-control" id="val-currency" name="photo" >
                                </div>
                            
                             <button type="submit" class="btn btn-primary mx-2">Submit</button>
                                                   
                            
                    
                        </form>
            <?php 
                if($_POST){
                    $_POST['updated_at']=date('Y-m-d H:i:s');
                    $_POST['updated_by']=1;
                    $rs=$mysqli->common_update('teacher',$_POST,$con);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}teacher_list.php'</script>";
                        }else{
                            echo $rs['error'];
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
            