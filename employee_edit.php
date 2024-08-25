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
                    <h4>Employee</h4>
                    <span class="ml-1">Add New</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="employee_list.php">Employee List</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add New</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Employee Form</h4>
                    </div>
        <?php 
            $olddata=$classdata=array();
            $con['id']=$_GET['id'];
            $result=$mysqli->common_select_single('employee','*',$con);
            if($result){
                if($result['data']){
                    $olddata=$result['data'];
                }
            }
            $cons['employee_id']=$_GET['id'];
            $result=$mysqli->common_select_single('employee_details','*',$cons);
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
                                        <label>Password</label>
                                        <input type="password"  name="password" id="password" class="form-control" value="<?= $olddata->password ?>">
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
                        $rs=move_uploaded_file($img['tmp_name'],'assets/employee/'.$imagename);
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
                
                $stu['email']=$_POST['email'];
                $stu['contact']=$_POST['contact'];
                
                if($_POST['password'])
                    $stu['password']=$_POST['password'];
                $stu['updated_at']=date('Y-m-d H:i:s');
                $stu['updated_by']=1;
                $rs=$mysqli->common_update('employee',$stu,$con);
                if($rs){
                    $stud['employee_id']=$rs['data'];
                    $stud['updated_at']=date('Y-m-d H:i:s');
                    $stud['updated_by']=1;
                    $cons['id']=$classdata->id;
                    $st=$mysqli->common_update('employee_details',$stud,$cons);

                    if($rs['data']){
                        echo "<script>window.location='{$baseurl}employee_list.php'</script>";
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
