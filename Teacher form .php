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
                            <div class="card-body">
                                <div class="form-validation">
                           <form class="form-valide" method="post" enctype="multipart/form-data">
                                    <div class="row">
                            <div class="col-lg-6">
                                <!-- First Column -->
                                <div class="form-group">
                                    <label for="val-username">Teacher's Name</label>
                                    <input type="text" class="form-control" id="val-username" name="name" placeholder="Enter name..">
                                </div>
                                <div class="form-group">
                                    <label for="val-email">Father's Name </label>
                                    <input type="text" class="form-control" id="val-email" name="father_name" placeholder="Enter name..">
                                </div>
                                <div class="form-group">
                                    <label for="val-password">Mother's Name</label>
                                    <input type="text" class="form-control" id="val-password" name="mother_name" placeholder="Enter name..">
                                </div>
                                <div class="form-group col-md-6 ms-0">
                                        <label>Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control" placeholder="Photo..">
                                    </div>
                                <div class="form-group">
                                    <label for="val-email">Contact</label>
                                    <input type="text" class="form-control" id="val-email" name="contact" placeholder="Enter phone no..">
                                </div>
                                <div class="form-group">
                                    <label for="val-email">Email </label>
                                    <input type="text" class="form-control" id="val-email" name="email" placeholder="Enter email..">
                                </div>
                                <div class="form-group">
                                <label class="form-label" for="class_id">Department</label>
                                        <select class="form-control form-select" required name="department_id" id="department_id">
                                        <option value="">Select Department</option>
                                        <?php 
                                            $result=$mysqli->common_select('department');
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $d){
                                        ?>
                                            <option value="<?= $d->id ?>" > <?= $d->department ?></option>
                                        <?php } } } ?>
                                    </select>
                                </div>
                                <!-- Continue adding other fields -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Second Column -->
                                <div class="form-group">
                                    <label for="val-currency">Qualification</label>
                                    <input type="text" class="form-control" id="val-currency" name="qualification" placeholder="last degree">
                                </div>
                                <div class="form-group">
                                    <label for="val-currency">Assigned Class </label>
                                    <input type="text" class="form-control" id="val-currency" name="assigned_class" placeholder="Assigned Class..">
                                </div>
                                <div class="form-group">
                                    <label for="val-website">Joining Date </label>
                                    <input type="date" class="form-control" id="val-website" name="joining" placeholder="http://example.com">
                                </div>
                                <div class="form-group">
                                    <label for="val-phoneus">Resign Date </label>
                                    <input type="date" class="form-control" id="val-phoneus" name="resign" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="val-digits">Designation</label>
                                    <select class="form-control form-select" required name="designation_id" id="designation_id">
                                        <option value="">Select Designation</option>
                                        <?php 
                                            $result=$mysqli->common_select('designation');
                                            if($result){
                                                if($result['data']){
                                                    $i=1;
                                                    foreach($result['data'] as $d){
                                        ?>
                                            <option value="<?= $d->id ?>" > <?= $d->designation ?></option>
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
                    $rs=move_uploaded_file($img['tmp_name'],'assets/teachers/'.$imagename);
                    if($rs){
                        $tec['photo']=$imagename;
                    }
                }else{
                    echo "Only image can be uploaded.";
                }
            }else{
                echo "File size cannot be more than 100KB";
            }
        }

            $tec['name']=$_POST['name'];
            $tec['father_name']=$_POST['father_name'];
            $tec['mother_name']=$_POST['mother_name'];
            $tec['email']=$_POST['email'];
            $tec['contact']=$_POST['contact'];
            $tec['qualification']=$_POST['qualification'];
            $tec['assigned_class']=$_POST['assigned_class'];
            $tec['joining']=$_POST['joining'];
            $tec['resign']=$_POST['resign'];
            $tec['designation_id']=$_POST['designation_id'];
            $tec['department_id']=$_POST['department_id'];
            $tec['created_at']=date('Y-m-d H:i:s');
            $tec['created_by']=1;
            $rs=$mysqli->common_create('teacher',$tec);
            if($rs){
                if($rs['data']){
                    $teac['teacher_id']=$rs['data'];
                    $teac['created_at']=date('Y-m-d H:i:s');
                    $teac['created_by']=1;
                    $te=$mysqli->common_create('teacher_attendance',$teac);
                    
                    if($te){
                        if($te['data']){
                            echo "<script>window.location='{$baseurl}teacher_list.php'</script>";
                        }else{
                            echo $te['error'];
                        }
                    }
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
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php include('include/footer.php') ?> 
 