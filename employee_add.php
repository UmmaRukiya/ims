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
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" enctype="multipart/form-data">
                                
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter employee name.. ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Photo</label>
                                        <input type="file" name="photo" id="photo" class="form-control" placeholder="Photo..">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label> Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Contact</label>
                                        <input type="text"  name="contact" id="contact" class="form-control" placeholder="Mobile no..">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password"  name="password" id="password" class="form-control" placeholder="password">
                                    </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
    <?php 
        if($_POST){

            if($_FILES){
            
                $img=$_FILES["photo"];
    
                if($img['size'] < (10000*1024)){
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

            $stu['name']=$_POST['name'];
            
            $stu['email']=$_POST['email'];
            $stu['contact']=$_POST['contact'];
           
            $stu['password']=$_POST['password'];
            $stu['created_at']=date('Y-m-d H:i:s');
            $stu['created_by']=1;
            $rs=$mysqli->common_create('employee',$stu);
            if($rs){
                if($rs['data']){
                    $stud['employee_id']=$rs['data'];
                    
                    $stud['created_at']=date('Y-m-d H:i:s');
                    $stud['created_by']=1;
                    $st=$mysqli->common_create('employee_details',$stud);
                    
                    if($st){
                        if($st['data']){
                            echo "<script>window.location='{$baseurl}employee_list.php'</script>";
                        }else{
                            echo $st['error'];
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
