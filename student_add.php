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
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-1">Validation</p>
                        
                    </div>
                </div>
                
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student_add.php">Form</a></li>
                        <li class="breadcrumb-item active"><a href="student_list.php">Datatable</a></li>
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
                                <form class="form-valide" action="#" method="post">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="username">Username
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-username" name="username" placeholder="Enter a username..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="email">Email <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="val-email" name="email" placeholder="Your valid email..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="password">Password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="val-password" name="password" placeholder="Choose a safe one..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="contact">Phone (BD) <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Your valid mobile no..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-suggestions">Photo <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                <input type="file" class="form-control" id="photo" name="photo" placeholder="Student photo..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="name">Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Student name..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="father">Father
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="father" name="father_name" placeholder="Student father name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="mother">Mother
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="mother" name="mother_name" placeholder="Student mother name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="id">Student ID <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="id" name="id" placeholder="Roll No..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
            <?php 
                if($_POST){
                    $_POST['created_at']=date('Y-m-d H:i:s');
                    $_POST['created_by']=1;
                    $rs=$mysqli->common_create('student',$_POST);
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
    



    <!-- Jquery Validation -->
    <script src="<?= $baseurl ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="<?= $baseurl ?>assets/js/plugins-init/jquery.validate-init.js"></script>

</body>
<?php include('include/footer.php') ?> 
        
</html>