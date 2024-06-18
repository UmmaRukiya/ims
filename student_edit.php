<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
        <?php 
            $olddata=array();
            $con['id']=$_GET['id'];
            $result=$mysqli->common_select_single('student','*',$con);
            if($result){
                if($result['data']){
                    $olddata=$result['data'];
                }
            }
        ?>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Student</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student_add.php">Form</a></li>
                            <li class="breadcrumb-item active"><a href="student_list.php">List</a></li>
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
                            <div class="card-body">
                                <div class="basic-form">
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text"  name="name" id="name" class="form-control" placeholder="Enter student name.. " value="<?= $olddata-> name ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control"  placeholder="Photo.." value="<?= $olddata-> photo ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Father</label>
                            <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father name.." value="<?= $olddata-> father_name ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mother</label>
                            <input type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Mother name.." value="<?= $olddata-> mother_name ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label> Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $olddata-> email ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact</label>
                            <input type="text"  name="contact" id="contact" class="form-control" value="<?= $olddata-> contact ?>">
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label>User Name</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $olddata-> username ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password"  name="password" id="password" class="form-control" value="<?= $olddata-> password ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php 
                if($_POST){
                    $_POST['updated_at']=date('Y-m-d H:i:s');
                    $_POST['updated_by']=1;
                    $rs=$mysqli->common_update('student',$_POST,$con);
                    if($rs){
                        if($rs['data']){
                            echo "<script>window.location='{$baseurl}student_list.php'</script>";
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= $baseurl ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= $baseurl ?>assets/js/quixnav-init.js"></script>
    <script src="<?= $baseurl ?>assets/js/custom.min.js"></script>
    
</body>
<?php include('include/footer.php') ?> 
</html>